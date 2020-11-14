<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Informasi;

class InformasiController extends Controller
{
    public function index(Request $request)
    {

        $informasi = Informasi::all();
             
        return view('informasi.index', ['informasi' => $informasi]);
    }
    
    public function create(Request $request)
    {
        $informasi = Informasi::all();
        $informasi = Informasi::create($request->all());
        
        return redirect('/informasi')->with('sukses','Data informasi berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $informasi = Informasi::find($id);
       
        return view('informasi.edit', ['informasi' => $informasi]);
    }

    public function update(Request $request, $id)
    {
        $informasi = Informasi::find($id);
       
        $informasi->update($request->all());
       
        return redirect('/informasi')->with('sukses','Data informasi berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $informasi = Informasi::find($id);

        $informasi->delete($informasi);
       
        return redirect('/informasi')->with('sukses','Data informasi berhasil dihapus!');
    }
}
