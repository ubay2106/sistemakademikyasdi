<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class TahunAjaranController extends Controller
{
    public function index()
    {
        $tahunajarans = TahunAjaran::latest()->paginate(10);

        return view('admin.tahunajaran.index', compact('tahunajarans'));
    }

    public function create()
    {
        return view('admin.tahunajaran.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:20|unique:tahun_ajarans,nama',
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('is_active')) {
            TahunAjaran::where('is_active', true)->update(['is_active' => false]);
        }

        TahunAjaran::create([
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.tahunajaran.index')
            ->with('success', 'Tahun ajaran berhasil ditambahkan.');
    }

    public function edit(TahunAjaran $tahunajaran)
    {
        return view('admin.tahunajaran.edit', compact('tahunajaran'));
    }

    public function update(Request $request, TahunAjaran $tahunajaran)
    {
        $request->validate([
            'nama' => 'required|string|max:20|unique:tahun_ajarans,nama,' . $tahunajaran->id,
            'tanggal_mulai' => 'nullable|date',
            'tanggal_selesai' => 'nullable|date|after_or_equal:tanggal_mulai',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('is_active')) {
            TahunAjaran::where('id', '!=', $tahunajaran->id)
                ->update(['is_active' => false]);
        }

        $tahunajaran->update([
            'nama' => $request->nama,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.tahunajaran.index')
            ->with('success', 'Tahun ajaran berhasil diperbarui.');
    }

    public function destroy(TahunAjaran $tahunajaran)
{
    if (
        $tahunajaran->semesters()->exists() ||
        $tahunajaran->pengajars()->exists() ||
        $tahunajaran->siswaKelas()->exists()
    ) {
        return back()->with('error', 'Tahun ajaran tidak bisa dihapus karena masih digunakan.');
    }

    $tahunajaran->delete();

    return redirect()->route('admin.tahunajaran.index')
        ->with('success', 'Tahun ajaran berhasil dihapus.');
}
}