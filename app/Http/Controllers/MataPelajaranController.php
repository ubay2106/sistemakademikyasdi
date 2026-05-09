<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MataPelajaran;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $matapelajarans = MataPelajaran::when($search, function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
                ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10);

    return view('admin.matapelajaran.index', compact('matapelajarans'));
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

        return redirect()->route('admin.matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil ditambahkan.');
    }

    public function edit(MataPelajaran $matapelajaran)
    {
        return view('admin.matapelajaran.edit', compact('matapelajaran'));
    }

    public function update(Request $request, MataPelajaran $matapelajaran)
    {
        $request->validate([
            'nama' => 'required|string|max:150|unique:mata_pelajarans,nama,' . $matapelajaran->id,
            'deskripsi' => 'nullable|string',
            'is_active' => 'nullable|boolean',
        ]);

        $matapelajaran->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'is_active' => $request->has('is_active') ? 1 : 0,
        ]);

        return redirect()->route('admin.matapelajaran.index')
            ->with('success', 'Mata pelajaran berhasil diperbarui.');
    }

    public function destroy(MataPelajaran $matapelajaran)
{
    if ($matapelajaran->pengajars()->exists()) {
        return back()->with('error', 'Mata pelajaran tidak bisa dihapus karena masih digunakan oleh data pengajar.');
    }

    $matapelajaran->delete();

    return redirect()->route('admin.matapelajaran.index')
        ->with('success', 'Mata pelajaran berhasil dihapus.');
}
}