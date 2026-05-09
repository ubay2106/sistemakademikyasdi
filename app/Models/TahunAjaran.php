<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAjaran extends Model
{
    protected $fillable = [
    'nama',
    'tanggal_mulai',
    'tanggal_selesai',
    'is_active',
];

public function semesters()
{
    return $this->hasMany(Semester::class);
}

public function pengajars()
{
    return $this->hasMany(Pengajar::class);
}

public function siswaKelas()
{
    return $this->hasMany(SiswaKelas::class);
}

    use HasFactory;
}
