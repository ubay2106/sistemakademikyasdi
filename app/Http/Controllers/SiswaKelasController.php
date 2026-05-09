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
    public function index(Request $request)
{
    $search = $request->search;

    $siswaKelas = SiswaKelas::with(['siswa', 'kelas', 'tahunAjaran'])
        ->when($search, function ($query, $search) {
            $query->whereHas('siswa', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nis', 'like', '%' . $search . '%');
                })
                ->orWhereHas('kelas', function ($q) use ($search) {
                    $q->where('nama_kelas', 'like', '%' . $search . '%');
                })
                ->orWhereHas('tahunAjaran', function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%');
                })
                ->orWhere('status', 'like', '%' . $search . '%');
        })
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

        $cek = SiswaKelas::where('siswa_id', $request->siswa_id)->where('tahun_ajaran_id', $request->tahun_ajaran_id)->first();

        if ($cek) {
            return back()->withInput()->with('error', 'Siswa ini sudah terdaftar pada tahun ajaran tersebut.');
        }

        SiswaKelas::create([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.siswakelas.index')->with('success', 'Siswa berhasil dimasukkan ke kelas.');
    }

    public function edit(SiswaKelas $siswakela)
    {
        $siswaKelas = $siswakela;

        $siswas = Siswa::where('status', 'aktif')->orderBy('nama')->get();
        $kelas = Kelas::orderBy('nama_kelas')->get();
        $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

        return view('admin.siswakelas.edit', compact('siswaKelas', 'siswas', 'kelas', 'tahunAjarans'));
    }

    public function update(Request $request, SiswaKelas $siswakela)
    {
        $request->validate([
            'siswa_id' => 'required|exists:siswas,id',
            'kelas_id' => 'required|exists:kelas,id',
            'tahun_ajaran_id' => 'required|exists:tahun_ajarans,id',
            'status' => 'required|in:aktif,naik,tinggal,lulus',
        ]);

        $cek = SiswaKelas::where('siswa_id', $request->siswa_id)->where('tahun_ajaran_id', $request->tahun_ajaran_id)->where('id', '!=', $siswakela->id)->first();

        if ($cek) {
            return back()->withInput()->with('error', 'Siswa ini sudah terdaftar pada tahun ajaran tersebut.');
        }

        $siswakela->update([
            'siswa_id' => $request->siswa_id,
            'kelas_id' => $request->kelas_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_id,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.siswakelas.index')->with('success', 'Data kelas siswa berhasil diperbarui.');
    }

    public function kenaikan()
{
    $kelas = Kelas::orderBy('nama_kelas')->get();
    $tahunAjarans = TahunAjaran::orderBy('nama', 'desc')->get();

    return view('admin.siswakelas.kenaikan', compact('kelas', 'tahunAjarans'));
}

public function prosesKenaikan(Request $request)
{
    $request->validate([
        'tahun_ajaran_lama_id' => 'required|exists:tahun_ajarans,id',
        'tahun_ajaran_baru_id' => 'required|exists:tahun_ajarans,id|different:tahun_ajaran_lama_id',
        'kelas_lama_id' => 'required|exists:kelas,id',
        'kelas_baru_id' => 'required|exists:kelas,id',
        'status_lama' => 'required|in:naik,tinggal,lulus',
    ]);

    $siswaKelasLama = SiswaKelas::with('siswa')
        ->where('tahun_ajaran_id', $request->tahun_ajaran_lama_id)
        ->where('kelas_id', $request->kelas_lama_id)
        ->where('status', 'aktif')
        ->get();

    if ($siswaKelasLama->isEmpty()) {
        return back()->withInput()->with('error', 'Tidak ada siswa aktif pada kelas dan tahun ajaran tersebut.');
    }

    $jumlahBerhasil = 0;
    $jumlahLewat = 0;

    foreach ($siswaKelasLama as $data) {
        $data->update([
            'status' => $request->status_lama,
        ]);

        if ($request->status_lama === 'lulus') {
            $data->siswa->update([
                'status' => 'lulus',
            ]);

            $jumlahBerhasil++;
            continue;
        }

        $cekTahunBaru = SiswaKelas::where('siswa_id', $data->siswa_id)
            ->where('tahun_ajaran_id', $request->tahun_ajaran_baru_id)
            ->first();

        if ($cekTahunBaru) {
            $jumlahLewat++;
            continue;
        }

        SiswaKelas::create([
            'siswa_id' => $data->siswa_id,
            'kelas_id' => $request->kelas_baru_id,
            'tahun_ajaran_id' => $request->tahun_ajaran_baru_id,
            'status' => 'aktif',
        ]);

        $jumlahBerhasil++;
    }

    return redirect()->route('admin.siswakelas.index')
        ->with('success', "Proses kenaikan kelas berhasil. Berhasil: {$jumlahBerhasil}, dilewati: {$jumlahLewat}.");
}

    public function destroy(SiswaKelas $siswakela)
    {
        $siswakela->delete();

        return redirect()->route('admin.siswakelas.index')->with('success', 'Data kelas siswa berhasil dihapus.');
    }
}
