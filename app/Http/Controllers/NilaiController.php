<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Pengajar;
use App\Models\Semester;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        $nilais = Nilai::with([
            'siswa',
            'pengajar.guru',
            'pengajar.kelas',
            'pengajar.mataPelajaran',
            'semester.tahunAjaran',
        ])->latest()->paginate(10);

        return view('admin.nilai.index', compact('nilais'));
    }

    public function create()
    {
        $siswas = Siswa::where('status', 'aktif')->orderBy('nama')->get();

        $pengajars = Pengajar::with(['guru', 'kelas', 'mataPelajaran', 'tahunAjaran'])
            ->where('is_active', true)
            ->get();

        $semesters = Semester::with('tahunAjaran')
            ->orderByDesc('id')
            ->get();

        return view('admin.nilai.create', compact('siswas', 'pengajars', 'semesters'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'pengajar_id' => 'required|exists:pengajars,id',
            'semester_id' => 'required|exists:semesters,id',
            'nilai_tugas' => 'nullable|numeric|min:0|max:100',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $cek = Nilai::where('siswa_id', $request->siswa_id)
            ->where('pengajar_id', $request->pengajar_id)
            ->where('semester_id', $request->semester_id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Nilai siswa untuk mapel dan semester ini sudah ada.');
        }

        $nilaiAkhir = $this->hitungNilaiAkhir(
            $request->nilai_tugas,
            $request->nilai_uts,
            $request->nilai_uas
        );

        Nilai::create([
            'siswa_id' => $request->siswa_id,
            'pengajar_id' => $request->pengajar_id,
            'semester_id' => $request->semester_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilaiAkhir,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil ditambahkan.');
    }

    public function edit(Nilai $nilai)
    {
        $siswas = Siswa::where('status', 'aktif')->orderBy('nama')->get();

        $pengajars = Pengajar::with(['guru', 'kelas', 'mataPelajaran', 'tahunAjaran'])
            ->where('is_active', true)
            ->get();

        $semesters = Semester::with('tahunAjaran')
            ->orderByDesc('id')
            ->get();

        return view('admin.nilai.edit', compact('nilai', 'siswas', 'pengajars', 'semesters'));
    }

    public function update(Request $request, Nilai $nilai)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'pengajar_id' => 'required|exists:pengajars,id',
            'semester_id' => 'required|exists:semesters,id',
            'nilai_tugas' => 'nullable|numeric|min:0|max:100',
            'nilai_uts' => 'nullable|numeric|min:0|max:100',
            'nilai_uas' => 'nullable|numeric|min:0|max:100',
            'catatan' => 'nullable|string',
        ]);

        $cek = Nilai::where('siswa_id', $request->siswa_id)
            ->where('pengajar_id', $request->pengajar_id)
            ->where('semester_id', $request->semester_id)
            ->where('id', '!=', $nilai->id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Nilai siswa untuk mapel dan semester ini sudah ada.');
        }

        $nilaiAkhir = $this->hitungNilaiAkhir(
            $request->nilai_tugas,
            $request->nilai_uts,
            $request->nilai_uas
        );

        $nilai->update([
            'siswa_id' => $request->siswa_id,
            'pengajar_id' => $request->pengajar_id,
            'semester_id' => $request->semester_id,
            'nilai_tugas' => $request->nilai_tugas,
            'nilai_uts' => $request->nilai_uts,
            'nilai_uas' => $request->nilai_uas,
            'nilai_akhir' => $nilaiAkhir,
            'catatan' => $request->catatan,
        ]);

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil diperbarui.');
    }

    public function destroy(Nilai $nilai)
    {
        $nilai->delete();

        return redirect()->route('nilai.index')
            ->with('success', 'Nilai berhasil dihapus.');
    }

    private function hitungNilaiAkhir($tugas, $uts, $uas)
    {
        $tugas = $tugas ?? 0;
        $uts = $uts ?? 0;
        $uas = $uas ?? 0;

        return round(($tugas * 0.3) + ($uts * 0.3) + ($uas * 0.4), 2);
    }
}