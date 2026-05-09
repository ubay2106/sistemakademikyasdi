<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\BeritaKategori;
use App\Models\BeritaTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $beritas = Berita::with(['kategori', 'user'])
        ->when($search, function ($query, $search) {
            $query->where('judul', 'like', '%' . $search . '%')
                ->orWhere('ringkasan', 'like', '%' . $search . '%')
                ->orWhere('status', 'like', '%' . $search . '%')
                ->orWhereHas('kategori', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })
                ->orWhereHas('user', function ($q) use ($search) {
                    $q->where('name', 'like', '%' . $search . '%');
                });
        })
        ->latest()
        ->paginate(10);

    return view('admin.berita.index', compact('beritas'));
}

    public function create()
    {
        $kategoris = BeritaKategori::where('is_active', true)->get();
        $tags = BeritaTag::all();

        return view('admin.berita.create', compact('kategoris', 'tags'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'berita_kategori_id' => 'nullable|exists:berita_kategoris,id',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:300',
            'isi' => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption_gambar' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'nullable|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:berita_tags,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        $gambarPath = null;

        if ($request->hasFile('gambar_utama')) {
            $gambarPath = $request->file('gambar_utama')->store('berita', 'public');
        }

        $berita = Berita::create([
            'user_id' => Auth::id(),
            'berita_kategori_id' => $request->berita_kategori_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . time(),
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'gambar_utama' => $gambarPath,
            'caption_gambar' => $request->caption_gambar,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
            'published_at' => $request->status === 'published' ? now() : null,
            'meta_title' => $request->meta_title ?? $request->judul,
            'meta_description' => $request->meta_description ?? $request->ringkasan,
            'meta_keywords' => $request->meta_keywords,
        ]);

        if ($request->has('tags')) {
            $berita->tags()->sync($request->tags);
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan.');
    }

    public function show(Berita $beritum)
    {
        $berita = $beritum->load(['kategori', 'tags', 'user']);

        return view('berita.show', compact('berita'));
    }

    public function edit(Berita $beritum)
    {
        $berita = $beritum;
        $kategoris = BeritaKategori::where('is_active', true)->get();
        $tags = BeritaTag::all();

        return view('admin.berita.edit', compact('berita', 'kategoris', 'tags'));
    }

    public function update(Request $request, Berita $beritum)
    {
        $berita = $beritum;

        $request->validate([
            'berita_kategori_id' => 'nullable|exists:berita_kategoris,id',
            'judul' => 'required|string|max:255',
            'ringkasan' => 'nullable|string|max:300',
            'isi' => 'required|string',
            'gambar_utama' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'caption_gambar' => 'nullable|string|max:255',
            'status' => 'required|in:draft,published,archived',
            'is_featured' => 'nullable|boolean',
            'tags' => 'nullable|array',
            'tags.*' => 'exists:berita_tags,id',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('gambar_utama')) {
            if ($berita->gambar_utama) {
                Storage::disk('public')->delete($berita->gambar_utama);
            }

            $berita->gambar_utama = $request->file('gambar_utama')->store('berita', 'public');
        }

        if ($berita->status === 'published' && $request->status === 'draft') {
            return back()->withErrors('Berita yang sudah dipublish tidak boleh kembali ke draft.');
        }

        $berita->update([
            'berita_kategori_id' => $request->berita_kategori_id,
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul) . '-' . $berita->id,
            'ringkasan' => $request->ringkasan,
            'isi' => $request->isi,
            'caption_gambar' => $request->caption_gambar,
            'status' => $request->status,
            'is_featured' => $request->has('is_featured'),
            'published_at' => $request->status === 'published' ? $berita->published_at ?? now() : $berita->published_at,
            'meta_title' => $request->meta_title ?? $request->judul,
            'meta_description' => $request->meta_description ?? $request->ringkasan,
            'meta_keywords' => $request->meta_keywords,
        ]);

        $berita->tags()->sync($request->tags ?? []);

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $beritum)
    {
        $berita = $beritum;

        if ($berita->gambar_utama) {
            Storage::disk('public')->delete($berita->gambar_utama);
        }

        $berita->forceDelete();

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil dihapus.');
    }

    public function frontendIndex(Request $request)
    {
        $kategoris = BeritaKategori::where('is_active', true)->get();

        $beritas = Berita::with(['kategori', 'user', 'tags'])
            ->where('status', 'published')
            ->when($request->kategori, function ($query) use ($request) {
                $query->whereHas('kategori', function ($q) use ($request) {
                    $q->where('slug', $request->kategori);
                });
            })
            ->latest()
            ->paginate(9);

        return view('page.berita-index', compact('beritas', 'kategoris'));
    }

    public function frontendShow($slug)
    {
        $berita = Berita::with(['kategori', 'user', 'tags'])
            ->where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        $berita->increment('jumlah_dilihat');

        $beritaTerkait = Berita::with('kategori')
            ->where('id', '!=', $berita->id)
            ->where('status', 'published')
            ->when($berita->berita_kategori_id, function ($query) use ($berita) {
                $query->where('berita_kategori_id', $berita->kategori_id);
            })
            ->latest()
            ->take(3)
            ->get();

        return view('page.berita-show', compact('berita', 'beritaTerkait'));
    }
}
