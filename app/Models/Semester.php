<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
    'nama',
    'tahun_ajaran_id',
    'is_active',
];

public function tahunAjaran()
{
    return $this->belongsTo(TahunAjaran::class);
}

public function nilais()
{
    return $this->hasMany(Nilai::class);
}

    use HasFactory;
}
