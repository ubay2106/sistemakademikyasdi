<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;

class NilaiController extends Controller
{

public function index(Request $request)
{
    $query = Nilai::with([
        'siswa',
        'pengajar.guru',
        'pengajar.kelas',
        'pengajar.mataPelajaran',
        'semester.tahunAjaran',
    ]);

    if ($request->filled('semester_id')) {
        $query->where('semester_id', $request->semester_id);
    }

    if ($request->filled('tahun_ajaran_id')) {
        $query->whereHas('semester', function ($q) use ($request) {
            $q->where('tahun_ajaran_id', $request->tahun_ajaran_id);
        });
    }

    if ($request->filled('kelas_id')) {
        $query->whereHas('pengajar', function ($q) use ($request) {
            $q->where('kelas_id', $request->kelas_id);
        });
    }

    if ($request->filled('mapel_id')) {
        $query->whereHas('pengajar', function ($q) use ($request) {
            $q->where('mata_pelajaran_id', $request->mapel_id);
        });
    }

    if ($request->filled('search')) {
        $query->whereHas('siswa', function ($q) use ($request) {
            $q->where('nama', 'like', '%' . $request->search . '%')
              ->orWhere('nis', 'like', '%' . $request->search . '%');
        });
    }

    $statQuery = clone $query;

    $rataRata = round($statQuery->whereNotNull('nilai_akhir')->avg('nilai_akhir') ?? 0, 2);
    $nilaiTertinggi = $statQuery->max('nilai_akhir') ?? 0;
    $nilaiTerendah = $statQuery->whereNotNull('nilai_akhir')->min('nilai_akhir') ?? 0;

    $nilais = $query->latest()->paginate(10);

    $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();
    $semesters = Semester::with('tahunAjaran')->orderByDesc('id')->get();
    $kelass = Kelas::orderBy('nama_kelas')->get();
    $mataPelajarans = MataPelajaran::orderBy('nama')->get();

    return view('admin.nilai.index', compact(
        'nilais',
        'tahunAjarans',
        'semesters',
        'kelass',
        'mataPelajarans',
        'rataRata',
        'nilaiTertinggi',
        'nilaiTerendah'
    ));
}

    public function show(Nilai $nilai)
    {
        $nilai->load([
            'siswa',
            'pengajar.guru',
            'pengajar.kelas',
            'pengajar.mataPelajaran',
            'semester.tahunAjaran',
        ]);

        return view('admin.nilai.show', compact('nilai'));
    }

   public function edit(Nilai $nilai)
{
    $nilai->load([
        'siswa',
        'pengajar.guru',
        'pengajar.kelas',
        'pengajar.mataPelajaran',
        'semester.tahunAjaran',
    ]);

    return view('admin.nilai.edit', compact('nilai'));
}

   public function update(Request $request, Nilai $nilai)
{
    $request->validate([
        'nilai_harian' => 'nullable|numeric|min:0|max:100',
        'nilai_tugas' => 'nullable|numeric|min:0|max:100',
        'nilai_uts' => 'nullable|numeric|min:0|max:100',
        'nilai_uas' => 'nullable|numeric|min:0|max:100',
        'catatan' => 'nullable|string',
    ]);

    $nilaiAkhir = $this->hitungRataRata(
        $request->nilai_harian,
        $request->nilai_tugas,
        $request->nilai_uts,
        $request->nilai_uas
    );

    $nilai->update([
        'nilai_harian' => $request->nilai_harian,
        'nilai_tugas' => $request->nilai_tugas,
        'nilai_uts' => $request->nilai_uts,
        'nilai_uas' => $request->nilai_uas,
        'nilai_akhir' => $nilaiAkhir,
        'catatan' => $request->catatan,
    ]);

    return redirect()->route('admin.nilai.index')
        ->with('success', 'Nilai berhasil diperbarui.');
}

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('admin.nilai.index')
            ->with('success', 'Nilai berhasil dihapus.');
    }

    private function hitungRataRata($harian, $tugas, $uts, $uas)
    {
        $nilai = collect([$harian, $tugas, $uts, $uas])
            ->filter(function ($item) {
                return $item !== null && $item !== '';
            });

        if ($nilai->count() === 0) {
            return null;
        }

        return round($nilai->avg(), 2);
    }
}