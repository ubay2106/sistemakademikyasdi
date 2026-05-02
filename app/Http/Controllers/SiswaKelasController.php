<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\Kelas;
use App\Models\TahunAjaran;
use App\Models\SiswaKelas;
use Illuminate\Http\Request;

class SiswaKelasController extends Controller
{
    public function index()
    {
        $siswaKelas = SiswaKelas::with(['siswa', 'kelas', 'tahunAjaran'])
            ->latest()
            ->paginate(10);

        return view('admin.siswakelas.index', compact('siswaKelas'));
    }

    public function create()
    {
        $siswas = Siswa::where('status', 'aktif')->orderBy('nama')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.siswakelas.create', compact('siswas', 'kelas', 'tahunAjarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'status' => 'required|in:aktif,naik,tinggal,lulus',
        ]);

        $cek = SiswaKelas::where('siswa_id', $request->siswa_id)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Siswa ini sudah terdaftar pada tahun ajaran tersebut.');
        }

        SiswaKelas::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'status' => $request->status,
        ]);

        return redirect()->route('siswakelas.index')
            ->with('success', 'Siswa berhasil dimasukkan ke kelas.');
    }

    public function edit(SiswaKelas $siswaKela)
    {
        $siswaKelas = $siswaKela;

        $siswas = Siswa::where('status', 'aktif')->orderBy('nama')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.siswa-kelas.edit', compact(
            'siswaKelas',
            'siswas',
            'kelas',
            'tahunAjarans'
        ));
    }

    public function update(Request $request, SiswaKelas $siswaKela)
    {
        $siswaKelas = $siswaKela;

        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'status' => 'required|in:aktif,naik,tinggal,lulus',
        ]);

        $cek = SiswaKelas::where('siswa_id', $request->siswa_id)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
            ->where('id', '!=', $siswaKelas->id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Siswa ini sudah terdaftar pada tahun ajaran tersebut.');
        }

        $siswaKelas->update([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'status' => $request->status,
        ]);

        return redirect()->route('siswakelas.index')
            ->with('success', 'Data kelas siswa berhasil diperbarui.');
    }

    public function destroy(SiswaKelas $siswaKela)
    {
        $siswaKela->delete();

        return redirect()->route('siswakelas.index')
            ->with('success', 'Data kelas siswa berhasil dihapus.');
    }
}