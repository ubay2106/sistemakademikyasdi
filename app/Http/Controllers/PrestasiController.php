<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PrestasiController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $prestasis = Prestasi::when($search, function ($query, $search) {
            $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('nama_peserta', 'like', '%' . $search . '%')
                ->orWhere('nis_nip', 'like', '%' . $search . '%')
                ->orWhere('kelas', 'like', '%' . $search . '%')
                ->orWhere('tingkat', 'like', '%' . $search . '%')
                ->orWhere('juara', 'like', '%' . $search . '%')
                ->orWhere('nama_lomba', 'like', '%' . $search . '%')
                ->orWhere('penyelenggara', 'like', '%' . $search . '%');
        })
        ->latest()
        ->paginate(10);

    return view('admin.prestasi.index', compact('prestasis'));
}

    public function create()
    {
        return view('admin.prestasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_peserta' => 'required|string|max:255',
            'nis_nip' => 'nullable|string|max:100',
            'kelas' => 'nullable|string|max:100',
            'tingkat' => 'required|string|max:100',
            'juara' => 'required|string|max:100',
            'nama_lomba' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        $fotoPath = null;

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('prestasi', 'public');
        }

        Prestasi::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'nama_peserta' => $request->nama_peserta,
            'nis_nip' => $request->nis_nip,
            'kelas' => $request->kelas,
            'tingkat' => $request->tingkat,
            'juara' => $request->juara,
            'nama_lomba' => $request->nama_lomba,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'is_featured' => $request->has('is_featured'),
            'meta_title' => $request->filled('meta_title') ? $request->meta_title : $request->judul,
            'meta_description' => $request->filled('meta_description') ? Str::limit(strip_tags($request->meta_description), 160) : Str::limit(strip_tags($request->deskripsi), 160),
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function show(Prestasi $prestasi)
    {
        return view('admin.prestasi.show', compact('prestasi'));
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'nama_peserta' => 'required|string|max:255',
            'nis_nip' => 'nullable|string|max:100',
            'kelas' => 'nullable|string|max:100',
            'tingkat' => 'required|string|max:100',
            'juara' => 'required|string|max:100',
            'nama_lomba' => 'required|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_featured' => 'nullable|boolean',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('foto')) {
            if ($prestasi->foto) {
                Storage::disk('public')->delete($prestasi->foto);
            }

            $prestasi->foto = $request->file('foto')->store('prestasi', 'public');
        }

        $prestasi->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . $prestasi->id,
            'nama_peserta' => $request->nama_peserta,
            'nis_nip' => $request->nis_nip,
            'kelas' => $request->kelas,
            'tingkat' => $request->tingkat,
            'juara' => $request->juara,
            'nama_lomba' => $request->nama_lomba,
            'penyelenggara' => $request->penyelenggara,
            'tanggal' => $request->tanggal,
            'deskripsi' => $request->deskripsi,
            'foto' => $prestasi->foto,
            'is_featured' => $request->has('is_featured'),
            'meta_title' => $request->filled('meta_title') ? $request->meta_title : $request->judul,
            'meta_description' => $request->filled('meta_description') ? Str::limit(strip_tags($request->meta_description), 160) : Str::limit(strip_tags($request->deskripsi), 160),
        ]);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui.');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->foto) {
            Storage::disk('public')->delete($prestasi->foto);
        }

        $prestasi->delete();

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus.');
    }

    public function frontendIndex()
    {
        $prestasis = Prestasi::latest()->paginate(9);

        return view('page.prestasi-index', compact('prestasis'));
    }

    public function frontendShow($slug)
    {
        $prestasi = Prestasi::where('slug', $slug)->firstOrFail();

        $prestasi->increment('jumlah_dilihat');

        $prestasiTerkait = Prestasi::where('id', '!=', $prestasi->id)->latest()->take(3)->get();

        return view('page.prestasi-show', compact('prestasi', 'prestasiTerkait'));
    }
}
