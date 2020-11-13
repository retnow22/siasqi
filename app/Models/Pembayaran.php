<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';

    protected $fillable = [
        'semester',
        'nominal',
        'keterangan',
        'tgl_pembayaran',
        'peserta_id',
    ];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);          
    }

}
