<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = ['user_id', 'nip', 'nama', 'jenis_kelamin', 'tempat_lahir', 'tanggal_lahir', 'no_hp', 'alamat', 'foto'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pengajars()
    {
        return $this->hasMany(Pengajar::class);
    }

    use HasFactory;
}
