<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'matpel_peserta';

    protected $fillable = [
        'matpel_id',
        'peserta_id',
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
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class);
    }

}
