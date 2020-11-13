<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    // use HasFactory;
    protected $table = 'pengajar';

    protected $fillable = [
        'nomor_induk',
        'nama',
        'prodi',
        'fakultas',
        'instansi',
        'angkatan',
        'no_hp',
        'jenis_kelamin',
        'level',
        'kode_pengajar',
        'user_id'
    ];

    public function matpel()
    {
        return $this->hasMany(Matpel::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
