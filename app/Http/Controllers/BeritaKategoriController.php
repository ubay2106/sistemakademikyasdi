<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\BeritaKategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaKategoriController extends Controller
{
    public function index()
    {
        $kategoris = BeritaKategori::withCount('beritas')
            ->latest()
            ->paginate(15);

        return view('admin.berita.kategori.index', compact('kategoris'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'        => 'required|string|max:100|unique:berita_kategoris,nama',
            'deskripsi'   => 'nullable|string|max:255',
        ]);

        BeritaKategori::create([
            'nama'       => $request->nama,
            'slug'       => Str::slug($request->nama) . '-' . time(),
            'deskripsi'  => $request->deskripsi,
            'is_active'  => true,
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit(BeritaKategori $kategori)
    {
        return view('admin.berita.kategori.edit', compact('kategori'));
    }

    public function update(Request $request, BeritaKategori $kategori)
    {
        $request->validate([
            'nama'       => 'required|string|max:100|unique:berita_kategoris,nama,' . $kategori->id,
            'deskripsi'  => 'nullable|string|max:255',
        ]);

        $kategori->update([
            'nama'      => $request->nama,
            'slug'      => Str::slug($request->nama) . '-' . $kategori->id,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Kategori berhasil diperbarui.');
    }

    public function destroy(BeritaKategori $kategori)
    {
        if ($kategori->beritas()->count() > 0) {
            return redirect()
                ->route('kategori.index')
                ->with('error', 'Kategori tidak dapat dihapus karena masih memiliki berita.');
        }

        $kategori->delete();

        return redirect()
            ->route('kategori.index')
            ->with('success', 'Kategori berhasil dihapus.');
    }

    public function toggle(BeritaKategori $kategori)
    {
        $kategori->update(['is_active' => !$kategori->is_active]);

        return redirect()
            ->route('admin.kategori.index')
            ->with('success', 'Status kategori berhasil diubah.');
    }
}