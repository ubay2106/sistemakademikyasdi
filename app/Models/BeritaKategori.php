<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeritaKategori extends Model
{
    protected $fillable = [
        'nama',
        'slug',
        'deskripsi',
        'is_active',
    ];
 
    protected $casts = [
        'is_active' => 'boolean',
    ];
 
    public function beritas()
    {
        return $this->hasMany(Berita::class, 'berita_kategori_id');
    }

    use HasFactory;
}
