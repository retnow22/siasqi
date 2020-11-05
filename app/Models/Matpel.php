<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    //use HasFactory;

    protected $table = 'matpel';

    protected $fillable = [
        'kode',
        'nama',
        'semester',
        'hari',
        'waktu',
        'level',
        'kuota',
        'pengajar_id',
        'peserta_id',
    ];

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class)
            ->withPivot([
                'nilai_lisan',
                'nilai_teori',
                'nilai_akhir',      
                'kkm',
                'keterangan',
                'penguji',
                ]);
    }

    public function nilai()
    {
        return $this->hasOne(Nilai::class);
    }
}
