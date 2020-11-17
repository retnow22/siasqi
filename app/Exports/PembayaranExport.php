<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PembayaranExport implements FromView
{
    public function view(): View
    {
        return view('export.pembayaran', [
            'pembayaran' => Pembayaran::all()
        ]);
    }
}
