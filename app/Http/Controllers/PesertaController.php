<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_peserta = Peserta::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_peserta = Peserta::all();            
        }
        
        return view('peserta.index', ['data_peserta' => $data_peserta]);
    }
    
    public function create(Request $request)
    {
        Peserta::create($request->all());

        return redirect('/peserta')->with('sukses','Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $peserta = Peserta::find($id);
       
        return view('peserta.edit', ['peserta' => $peserta]);
    }

    public function update(Request $request, $id)
    {
        $peserta = Peserta::find($id);
       
        $peserta->update($request->all());
       
        return redirect('/peserta')->with('sukses','Data berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $peserta = Peserta::find($id);

        $peserta->delete($peserta);
       
        return redirect('/peserta')->with('sukses','Data berhasil dihapus!');
    }
}
