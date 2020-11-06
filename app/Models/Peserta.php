<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // use HasFactory;
    protected $table = 'peserta';

    protected $fillable = [
        'nis',
        'nama',
        'prodi',
        'fakultas',
        'instansi',
        'angkatan',
        'no_hp',
        'jenis_kelamin',
        'level',
        'semester_masuk',
        'status',
        'user_id'
    ];

    public function matpel()
    {
        return $this->belongsToMany(Matpel::class)
            ->withPivot([
                'nilai_lisan',
                'nilai_teori',
                'nilai_akhir',      
                'kkm',
                'keterangan',
                'penguji',
                ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

}
