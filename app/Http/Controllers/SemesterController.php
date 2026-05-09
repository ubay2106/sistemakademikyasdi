<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use App\Models\TahunAjaran;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function index()
    {
        $semesters = Semester::with('tahunAjaran')->latest()->paginate(10);

        return view('admin.semester.index', compact('semesters'));
    }

    public function create()
    {
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.semester.create', compact('tahunAjarans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|in:Ganjil,Genap',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('is_active')) {
            Semester::where('is_active', true)->update(['is_active' => false]);
        }

        Semester::create([
            'nama' => $request->nama,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.semester.index')
            ->with('success', 'Semester berhasil ditambahkan.');
    }

    public function edit(Semester $semester)
    {
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.semester.edit', compact('semester', 'tahunAjarans'));
    }

    public function update(Request $request, Semester $semester)
    {
        $request->validate([
            'nama' => 'required|in:Ganjil,Genap',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'is_active' => 'nullable|boolean',
        ]);

        if ($request->has('is_active')) {
            Semester::where('id', '!=', $semester->id)
                ->update(['is_active' => false]);
        }

        $semester->update([
            'nama' => $request->nama,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'is_active' => $request->has('is_active') ? true : false,
        ]);

        return redirect()->route('admin.semester.index')
            ->with('success', 'Semester berhasil diperbarui.');
    }

    public function destroy(Semester $semester)
{
    if ($semester->nilais()->exists()) {
        return back()->with('error', 'Semester tidak bisa dihapus karena sudah digunakan pada data nilai.');
    }

    $semester->delete();

    return redirect()->route('admin.semester.index')
        ->with('success', 'Semester berhasil dihapus.');
}
}