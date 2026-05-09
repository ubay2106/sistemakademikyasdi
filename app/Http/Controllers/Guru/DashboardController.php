<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Nilai;
use App\Models\Pengajar;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $guru = Auth::user()->guru;

        if (!$guru) {
            abort(403, 'Akun ini belum terhubung dengan data guru.');
        }

        $tahunAktif = TahunAjaran::where('is_active', true)->first();

        $pengajars = Pengajar::with(['kelas', 'mataPelajaran', 'tahunAjaran'])
            ->where('guru_id', $guru->id)
            ->where('is_active', true)
            ->latest()
            ->get();

        $pengajarIds = $pengajars->pluck('id');

        $totalKelas = $pengajars->pluck('kelas_id')->unique()->count();

        $totalMapel = $pengajars->pluck('mata_pelajaran_id')->unique()->count();

        $totalNilai = Nilai::whereIn('pengajar_id', $pengajarIds)->count();

        $totalSiswa = SiswaKelas::where(function ($query) use ($pengajars) {
            foreach ($pengajars as $pengajar) {
                $query->orWhere(function ($q) use ($pengajar) {
                    $q->where('kelas_id', $pengajar->kelas_id)->where('tahun_ajaran_id', $pengajar->tahun_ajaran_id);
                });
            }
        })
            ->where('status', 'aktif')
            ->distinct('siswa_id')
            ->count('siswa_id');

        return view('guru.dashboard', compact('guru', 'tahunAktif', 'pengajars', 'totalKelas', 'totalSiswa', 'totalNilai', 'totalMapel'));
    }
}
