<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Pengajar;
use App\Models\Semester;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NilaiController extends Controller
{
    public function index()
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403);
        }

        $semester = Semester::where('is_active', true)->first();

        $pengajars = Pengajar::with(['kelas', 'mataPelajaran', 'tahunAjaran'])
            ->where('guru_id', $guru->id)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view('guru.nilai.index', compact('pengajars', 'semester'));
    }

    public function input(Pengajar $pengajar)
    {
        $guru = Auth::user()->guru;

        if (!$guru || $pengajar->guru_id !== $guru->id) {
            abort(403);
        }

        $semester = Semester::where('is_active', true)->first();

        if (!$semester) {
            return redirect()->route('guru.nilai.index')
                ->with('error', 'Semester aktif belum dibuat oleh admin.');
        }

        $siswaKelas = SiswaKelas::with('siswa')
            ->where('kelas_id', $pengajar->kelas_id)
            ->where('tahun_ajaran_id', $pengajar->tahun_ajaran_id)
            ->where('status', 'aktif')
            ->get();

        $nilais = Nilai::where('pengajar_id', $pengajar->id)
            ->where('semester_id', $semester->id)
            ->get()
            ->keyBy('siswa_id');

        return view('guru.nilai.input', compact(
            'pengajar',
            'semester',
            'siswaKelas',
            'nilais'
        ));
    }

    public function simpan(Request $request, Pengajar $pengajar)
    {
        $guru = Auth::user()->guru;

        if (!$guru || $pengajar->guru_id !== $guru->id) {
            abort(403);
        }

        $request->validate([
    'semester_id' => 'required|exists:semesters,id',
    'nilai' => 'nullable|array',
    'nilai.*.nilai_harian' => 'nullable|numeric|min:0|max:100',
    'nilai.*.nilai_tugas' => 'nullable|numeric|min:0|max:100',
    'nilai.*.nilai_uts' => 'nullable|numeric|min:0|max:100',
    'nilai.*.nilai_uas' => 'nullable|numeric|min:0|max:100',
    'nilai.*.catatan' => 'nullable|string',
]);

        foreach ($request->nilai ?? [] as $siswaId => $data) {
            $nilaiAkhir = $this->hitungRataRata(
                $data['nilai_harian'] ?? null,
                $data['nilai_tugas'] ?? null,
                $data['nilai_uts'] ?? null,
                $data['nilai_uas'] ?? null
            );

            Nilai::updateOrCreate(
                [
                    'siswa_id' => $siswaId,
                    'pengajar_id' => $pengajar->id,
                    'semester_id' => $request->semester_id,
                ],
                [
                    'nilai_harian' => $data['nilai_harian'] ?? null,
                    'nilai_tugas' => $data['nilai_tugas'] ?? null,
                    'nilai_uts' => $data['nilai_uts'] ?? null,
                    'nilai_uas' => $data['nilai_uas'] ?? null,
                    'nilai_akhir' => $nilaiAkhir,
                    'catatan' => $data['catatan'] ?? null,
                ]
            );
        }

        return redirect()->route('guru.nilai.index')
            ->with('success', 'Nilai siswa berhasil disimpan.');
    }

    public function rekap()
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403);
        }

        $pengajars = Pengajar::with(['kelas', 'mataPelajaran', 'tahunAjaran'])
            ->withCount('nilais')
            ->where('guru_id', $guru->id)
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return view('guru.nilai.rekap', compact('pengajars'));
    }

    public function lihat(Pengajar $pengajar)
    {
        $guru = Auth::user()->guru;

        if (!$guru || $pengajar->guru_id !== $guru->id) {
            abort(403);
        }

        $semester = Semester::where('is_active', true)->first();

        if (!$semester) {
            return redirect()->route('guru.nilai.rekap')
                ->with('error', 'Semester aktif belum dibuat oleh admin.');
        }

        $nilais = Nilai::with(['siswa', 'semester'])
            ->where('pengajar_id', $pengajar->id)
            ->where('semester_id', $semester->id)
            ->orderBy('nilai_akhir', 'desc')
            ->paginate(10);

        $rataRata = Nilai::where('pengajar_id', $pengajar->id)
            ->where('semester_id', $semester->id)
            ->whereNotNull('nilai_akhir')
            ->avg('nilai_akhir');

        return view('guru.nilai.lihat', compact(
            'pengajar',
            'semester',
            'nilais',
            'rataRata'
        ));
    }

    public function edit(Nilai $nilai)
{
    $guru = Auth::user()->guru;

    $nilai->load([
        'siswa',
        'pengajar.kelas',
        'pengajar.mataPelajaran',
        'semester',
    ]);

    if (!$guru || $nilai->pengajar->guru_id !== $guru->id) {
        abort(403);
    }

    return view('guru.nilai.edit', compact('nilai'));
}

    public function update(Request $request, Nilai $nilai)
    {
        $guru = Auth::user()->guru;

        $nilai->load('pengajar');

        if (!$guru || $nilai->pengajar->guru_id !== $guru->id) {
            abort(403);
        }

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

        return redirect()->route('guru.nilai.lihat', $nilai->pengajar_id)
            ->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $guru = Auth::user()->guru;

        $nilai->load('pengajar');

        if (!$guru || $nilai->pengajar->guru_id !== $guru->id) {
            abort(403);
        }

        $pengajarId = $nilai->pengajar_id;

        $nilai->delete();

        return redirect()->route('guru.nilai.lihat', $pengajarId)
            ->with('success', 'Nilai siswa berhasil dihapus.');
    }

    private function hitungRataRata($harian, $tugas, $uts, $uas)
    {
        $nilai = collect([$harian, $tugas, $uts, $uas])
            ->filter(fn ($item) => $item !== null && $item !== '');

        if ($nilai->count() === 0) {
            return null;
        }

        return round($nilai->avg(), 2);
    }
}