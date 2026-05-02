<?php

namespace App\Models;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'berita_kategori_id',
        'judul',
        'slug',
        'ringkasan',
        'isi',
        'gambar_utama',
        'caption_gambar',
        'status',
        'is_featured',
        'jumlah_dilihat',
        'published_at',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'published_at' => 'datetime',
    ];

    public function kategori()
    {
        return $this->belongsTo(BeritaKategori::class, 'berita_kategori_id');
    }

    public function tags()
    {
        return $this->belongsToMany(BeritaTag::class, 'berita_tag');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
