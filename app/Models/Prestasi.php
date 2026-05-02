<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
    'judul',
    'slug',
    'nama_peserta',
    'nis_nip',
    'kelas',
    'tingkat',
    'juara',
    'nama_lomba',
    'penyelenggara',
    'tanggal',
    'deskripsi',
    'foto',
    'is_featured',
    'jumlah_dilihat',
    'meta_title',
    'meta_description',
];

protected $casts = [
    'tanggal' => 'date',
    'is_featured' => 'boolean',
];
}
