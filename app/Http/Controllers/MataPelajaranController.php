<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index()
    {
        $mataPelajarans = MataPelajaran::latest()->paginate(10);

        return view('admin.matapelajaran.index', compact('mataPelajarans'));
    }

    public function create()
    {
        return view('admin.matapelajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:150|unique:mata_pelajarans,nama',
            'deskripsi' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        MataPelajaran::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function show(MataPelajaran $mataPelajaran)
    {
        return view('admin.matapelajaran.show', compact('mataPelajaran'));
    }

    public function edit(MataPelajaran $mataPelajaran)
    {
        return view('admin.matapelajaran.edit', compact('mataPelajaran'));
    }

    public function update(Request $request, MataPelajaran $mataPelajaran)
    {
        $request->validate([
            'nama' => 'required|string|max:150|unique:mata_pelajarans,nama,' . $mataPelajaran->id,
            'deskripsi' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $mataPelajaran->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy(MataPelajaran $mataPelajaran)
    {
        $mataPelajaran->delete();

        return redirect()->route('matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil dihapus.');
    }
}