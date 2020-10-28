<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index()
    {
        $data_peserta = Peserta::all();
        return view('peserta.index', ['data_peserta' => $data_peserta]);
    } 
}
