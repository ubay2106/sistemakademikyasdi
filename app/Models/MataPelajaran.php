<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    protected $fillable = ['nama', 'deskripsi', 'is_active'];

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class);
    }

    use HasFactory;
}
