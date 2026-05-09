<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Nilai;
use App\Models\Pengajar;
use App\Models\Prestasi;
use App\Models\Semester;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;

class DashboardController extends Controller
{
    public function index()
    {
        $tahunAktif = TahunAjaran::where('is_active', true)->first();

        $semesterAktif = Semester::with('tahunAjaran')
            ->where('is_active', true)
            ->first();

        $totalGuru = Guru::count();
        $totalSiswa = Siswa::where('status', 'aktif')->count();
        $totalKelas = Kelas::count();
        $totalMapel = MataPelajaran::count();

        $totalPengajar = Pengajar::where('is_active', true)->count();
        $totalNilai = Nilai::count();

        $totalBerita = Berita::count();
        $totalPrestasi = Prestasi::count();

        $siswaAktifKelas = SiswaKelas::with(['siswa', 'kelas', 'tahunAjaran'])
            ->when($tahunAktif, function ($query) use ($tahunAktif) {
                $query->where('tahun_ajaran_id', $tahunAktif->id);
            })
            ->where('status', 'aktif')
            ->count();

        $nilaiTerbaru = Nilai::with([
                'siswa',
                'pengajar.guru',
                'pengajar.kelas',
                'pengajar.mataPelajaran',
                'semester.tahunAjaran',
            ])
            ->latest()
            ->take(5)
            ->get();

        $pengajarTerbaru = Pengajar::with([
                'guru',
                'kelas',
                'mataPelajaran',
                'tahunAjaran',
            ])
            ->latest()
            ->take(5)
            ->get();

        $beritaTerbaru = Berita::latest()
            ->take(5)
            ->get();

        $prestasiTerbaru = Prestasi::latest()
            ->take(5)
            ->get();

        $kelasTerisi = Kelas::withCount([
                'siswaKelas as total_siswa_aktif' => function ($query) use ($tahunAktif) {
                    $query->where('status', 'aktif');

                    if ($tahunAktif) {
                        $query->where('tahun_ajaran_id', $tahunAktif->id);
                    }
                }
            ])
            ->orderBy('nama_kelas')
            ->get();

        $rataRataNilai = round(Nilai::whereNotNull('nilai_akhir')->avg('nilai_akhir') ?? 0, 2);

        $nilaiTertinggi = Nilai::whereNotNull('nilai_akhir')->max('nilai_akhir') ?? 0;

        $nilaiTerendah = Nilai::whereNotNull('nilai_akhir')->min('nilai_akhir') ?? 0;

        return view('admin.dashboard', compact(
            'tahunAktif',
            'semesterAktif',
            'totalGuru',
            'totalSiswa',
            'totalKelas',
            'totalMapel',
            'totalPengajar',
            'totalNilai',
            'totalBerita',
            'totalPrestasi',
            'siswaAktifKelas',
            'nilaiTerbaru',
            'pengajarTerbaru',
            'beritaTerbaru',
            'prestasiTerbaru',
            'kelasTerisi',
            'rataRataNilai',
            'nilaiTertinggi',
            'nilaiTerendah'
        ));
    }
}