<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajar extends Model
{
    // use HasFactory;
    protected $table = 'pengajar';

    protected $fillable = [
        'nip',
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
}
