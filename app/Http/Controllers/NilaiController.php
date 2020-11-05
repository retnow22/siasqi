<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;
Use App\Models\Matpel;
Use App\Models\Nilai;

class NilaiController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_peserta = Peserta::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_peserta = Peserta::all();            
        }

        $matpel = Matpel::all();

        $nilai = Nilai::all();
        
        return view('nilai.nilai_uas', ['data_peserta' => $data_peserta, 'matpel' => $matpel, 'nilai' => $nilai]);
    }
    
    public function create(Request $request)
    {
        $matpel = Matpel::all();
        $data_peserta = Peserta::all();
        $nilai = Nilai::create($request->all());
        
        return redirect('/nilai')->with('sukses','Data nilai berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $nilai = Nilai::find($id);
       
        return view('nilai.edit', ['nilai' => $nilai]);
    }

    public function update(Request $request, $id)
    {
        $nilai = Nilai::find($id);
       
        $nilai->update($request->all());
       
        return redirect('/nilai')->with('sukses','Data nilai berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $nilai = Nilai::find($id);

        $nilai->delete($nilai);
       
        return redirect('/nilai')->with('sukses','Data nilai berhasil dihapus!');
    }
}
