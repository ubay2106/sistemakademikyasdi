<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class NilaiExport implements FromCollection, WithHeadings
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function collection()
    {
        $query = Nilai::with([
            'siswa',
            'pengajar.kelas',
            'pengajar.mataPelajaran',
            'pengajar.guru',
            'semester.tahunAjaran'
        ]);

        if ($this->request->tahun_ajaran_id) {
            $query->whereHas('semester', function ($q) {
                $q->where('tahun_ajaran_id', $this->request->tahun_ajaran_id);
            });
        }

        if ($this->request->semester_id) {
            $query->where('semester_id', $this->request->semester_id);
        }

        if ($this->request->kelas_id) {
            $query->whereHas('pengajar', function ($q) {
                $q->where('kelas_id', $this->request->kelas_id);
            });
        }

        if ($this->request->mapel_id) {
            $query->whereHas('pengajar', function ($q) {
                $q->where('mata_pelajaran_id', $this->request->mapel_id);
            });
        }

        if ($this->request->search) {
            $query->whereHas('siswa', function ($q) {
                $q->where('nama', 'like', '%' . $this->request->search . '%')
                  ->orWhere('nis', 'like', '%' . $this->request->search . '%');
            });
        }

        return $query->get()->map(function ($nilai) {
            return [
                'NIS' => $nilai->siswa->nis ?? '-',
                'Nama Siswa' => $nilai->siswa->nama ?? '-',
                'Kelas' => $nilai->pengajar->kelas->nama_kelas ?? '-',
                'Mata Pelajaran' => $nilai->pengajar->mataPelajaran->nama ?? '-',
                'Guru' => $nilai->pengajar->guru->nama ?? '-',
                'Semester' => $nilai->semester->nama ?? '-',
                'Tahun Ajaran' => $nilai->semester->tahunAjaran->nama ?? '-',
                'Nilai Harian' => $nilai->nilai_harian,
                'Nilai Tugas' => $nilai->nilai_tugas,
                'Nilai UTS' => $nilai->nilai_uts,
                'Nilai UAS' => $nilai->nilai_uas,
                'Nilai Akhir' => $nilai->nilai_akhir,
                'Catatan' => $nilai->catatan ?? '-',
            ];
        });
    }

    public function headings(): array
    {
        return [
            'NIS',
            'Nama Siswa',
            'Kelas',
            'Mata Pelajaran',
            'Guru',
            'Semester',
            'Tahun Ajaran',
            'Nilai Harian',
            'Nilai Tugas',
            'Nilai UTS',
            'Nilai UAS',
            'Nilai Akhir',
            'Catatan',
        ];
    }
}