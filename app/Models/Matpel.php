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
        'grup',
        'evaluasi',
        'pengajar_id',
        'peserta_id',
    ];

    public function peserta()
    {
        return $this->belongsToMany(Peserta::class)
            ->withPivot([
                'id',
                'nilai_lisan',
                'nilai_teori',
                'nilai_akhir',      
                'kkm',
                'keterangan',
                'penguji',
                'pertemuan1',
                'pertemuan2',
                'pertemuan3',
                'pertemuan4',
                'pertemuan5',
                'pertemuan6',
                'pertemuan7',
                'pertemuan8',
                'pertemuan9',
                'pertemuan10',
                'pertemuan11',
                'pertemuan12',
                'evaluasi',
                ]);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    public function presensi()
    {
        return $this->hasMany(Presensi::class);
    }
}
