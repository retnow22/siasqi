<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RombelExport implements FromView
{

    public function view(): View
    {
        return view('export.rombel', [
            'rombel' => Nilai::all()
        ]);
    }
}
