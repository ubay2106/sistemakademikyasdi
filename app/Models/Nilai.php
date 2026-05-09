<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
    'siswa_id',
    'pengajar_id',
    'semester_id',
    'nilai_harian',
    'nilai_tugas',
    'nilai_uts',
    'nilai_uas',
    'nilai_akhir',
    'catatan',
];

public function siswa()
{
    return $this->belongsTo(Siswa::class);
}

public function pengajar()
{
    return $this->belongsTo(Pengajar::class);
}

public function semester()
{
    return $this->belongsTo(Semester::class);
}
    use HasFactory;
}
