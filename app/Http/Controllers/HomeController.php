<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class HomeController extends Controller
{
    public function index()
    {
        $informasi_sqi = Informasi::where('pelaksana','LIKE', "SQI")->get();

        $informasi_qi = Informasi::where('pelaksana','LIKE', 'QI')->get();

        return view('home.index', ['informasi_sqi' => $informasi_sqi, 'informasi_qi' => $informasi_qi]);
    }
}
