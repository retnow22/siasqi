<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    // use HasFactory;
    protected $table = 'peserta';

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
        'semester_masuk',
        'status',
        'user_id'
    ];

    public function matpel()
    {
        return $this->belongsToMany(Matpel::class)
            ->withPivot([
                'id',
                'matpel_id',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class);
    }

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class);
    }

}
