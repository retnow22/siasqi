<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presensi extends Model
{
    use HasFactory;

    protected $table = 'presensi';

    protected $fillable = [
        'matpel_id',
        'pengajar_id',
        'tanggal',
        'pertemuan_ke',
        'kehadiran',      
        'materi',
        'keterangan',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }

    public function matpel()
    {
        return $this->belongsTo(Matpel::class);
    }
}
