<?php

namespace App\Exports;

use App\Models\Kafalah;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class KafalahExport implements FromView
{
    public function view(): View
    {
        return view('export.kafalah', [
            'kafalah' => Kafalah::all()
        ]);
    }
}
