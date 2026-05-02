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
    use HasFactory;
}
