<?php

namespace App\Exports;

use App\Models\Pengajar;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PengajarExport implements FromView
{
    public function view(): View
    {
        return view('export.data_pengajar', [
            'data_pengajar' => Pengajar::all()
        ]);
    }
}
