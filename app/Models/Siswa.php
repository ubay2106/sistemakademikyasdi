<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $fillable = [
    'nis',
    'nama',
    'jenis_kelamin',
    'tempat_lahir',
    'tanggal_lahir',
    'status',
];

    use HasFactory;
}
