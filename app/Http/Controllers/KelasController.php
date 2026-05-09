<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Guru;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function index(Request $request)
{
    $kelas = Kelas::with('waliKelas')
        ->when($request->search, function ($query, $search) {
            $query->where('nama_kelas', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10)->appends(request()->query());

    $gurus = Guru::orderBy('nama')->get();

    return view('admin.kelas.index', compact('kelas', 'gurus'));
}

    public function create()
    {
        $gurus = Guru::all();
        return view('admin.kelas.create', compact('gurus'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas',
            'wali_kelas_id' => 'nullable|exists:gurus,id',
        ]);

        Kelas::create([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil ditambahkan.');
    }

    public function edit(Kelas $kelas)
    {
        $gurus = Guru::all();
        return view('admin.kelas.edit', compact('kelas', 'gurus'));
    }

    public function update(Request $request, Kelas $kelas)
    {
        $request->validate([
            'nama_kelas' => 'required|unique:kelas,nama_kelas,' . $kelas->id,
            'wali_kelas_id' => 'nullable|exists:gurus,id',
        ]);

        $kelas->update([
            'nama_kelas' => $request->nama_kelas,
            'wali_kelas_id' => $request->wali_kelas_id,
        ]);

        return redirect()->route('admin.kelas.index')
            ->with('success', 'Data kelas berhasil diperbarui.');
    }

    public function destroy(Kelas $kelas)
{
    if (
        $kelas->pengajars()->exists() ||
        $kelas->siswaKelas()->exists()
    ) {
        return back()->with('error', 'Kelas tidak bisa dihapus karena masih digunakan.');
    }

    $kelas->delete();

    return redirect()->route('admin.kelas.index')
        ->with('success', 'Data kelas berhasil dihapus.');
}
}