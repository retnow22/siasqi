<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kafalah extends Model
{
    use HasFactory;

    protected $table = 'kafalah';

    protected $fillable = [
        'semester',     
        'pengajar_id',  
        'jumlah_mengajar',
        'badal',
        'nominal',      
        'total_pembayaran',
    ];

    public function pengajar()
    {
        return $this->belongsTo(Pengajar::class);
    }
}
