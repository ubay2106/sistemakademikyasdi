<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Pengajar;
use App\Models\Guru;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class PengajarController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $pengajars = Pengajar::with([
            'guru',
            'kelas',
            'mataPelajaran',
            'tahunAjaran'
        ])
        ->when($search, function ($query, $search) {
            $query->whereHas('guru', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nip', 'like', '%' . $search . '%');
                })
                ->orWhereHas('kelas', function ($q) use ($search) {
                    $q->where('nama_kelas', 'like', '%' . $search . '%');
                })
                ->orWhereHas('mataPelajaran', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tahunAjaran', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                });
        })
        ->latest()
        ->paginate(10);

    return view('admin.pengajar.index', compact('pengajars'));
}

    public function create()
    {
        $gurus = Guru::orderBy('nama')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $mataPelajarans = MataPelajaran::orderBy('nama')->get();
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.pengajar.create', compact(
            'gurus',
            'kelas',
            'mataPelajarans',
            'tahunAjarans'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'is_active' => 'nullable|boolean',
        ]);

        $cek = Pengajar::where('guru_id', $request->guru_id)
            ->where('kelas_id', $request->kelas_id)
            ->where('mata_pelajaran_id', $request->mata_pelajaran_id)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Data pengajar tersebut sudah ada.');
        }

        Pengajar::create([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.pengajar.index')
            ->with('success', 'Data pengajar berhasil ditambahkan.');
    }

    public function edit(Pengajar $pengajar)
    {
        $gurus = Guru::orderBy('nama')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $mataPelajarans = MataPelajaran::orderBy('nama')->get();
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.pengajar.edit', compact(
            'pengajar',
            'gurus',
            'kelas',
            'mataPelajarans',
            'tahunAjarans'
        ));
    }

    public function update(Request $request, Pengajar $pengajar)
    {
        $request->validate([
            'guru_id' => 'required|exists:gurus,id',
            'kelas_id' => 'required|exists:kelas,id',
            'mata_pelajaran_id' => 'required|exists:mata_pelajarans,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'is_active' => 'nullable|boolean',
        ]);

        $cek = Pengajar::where('guru_id', $request->guru_id)
            ->where('kelas_id', $request->kelas_id)
            ->where('mata_pelajaran_id', $request->mata_pelajaran_id)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_id)
            ->where('id', '!=', $pengajar->id)
            ->first();

        if ($cek) {
            return back()
                ->withInput()
                ->with('error', 'Data pengajar tersebut sudah ada.');
        }

        $pengajar->update([
            'guru_id' => $request->guru_id,
            'kelas_id' => $request->kelas_id,
            'mata_pelajaran_id' => $request->mata_pelajaran_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.pengajar.index')
            ->with('success', 'Data pengajar berhasil diperbarui.');
    }

    public function destroy(Pengajar $pengajar)
{
    if ($pengajar->nilais()->exists()) {
        return back()->with('error', 'Pengajar tidak bisa dihapus karena sudah memiliki data nilai.');
    }

    $pengajar->delete();

    return redirect()->route('admin.pengajar.index')
        ->with('success', 'Data pengajar berhasil dihapus.');
}
}