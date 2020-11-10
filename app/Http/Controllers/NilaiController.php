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

        // Ceritanya mau bikin filter di selection peserta, jadi kalau diselect mp a, 
        // maka peserta yang muncul hanya yg mengambil mp tersebut,, tp masih -GAGAL-
        if($request->has('matpel_id')){
            $matpelsel = Matpel::find($request->matpel_id);
    
            $data_peserta = $matpelsel->peserta();

            dd($data_peserta->all());

            $matpel = Matpel::all();

            $nilai = Nilai::all();

            return view('nilai.nilai_uas', ['data_peserta' => $data_peserta, 'matpel' => $matpel, 'nilai' => $nilai, 'matpelsel' => $matpelsel]);
        }else{
            $matpel = Matpel::all();

            $nilai = Nilai::all();
        }
             
        return view('nilai.nilai_uas', ['data_peserta' => $data_peserta, 'matpel' => $matpel, 'nilai' => $nilai]);
    }
    
    public function create(Request $request)
    {
        $matpel = Matpel::all();
        $data_peserta = Peserta::all();
        $peserta = Peserta::find($request->peserta_id);
        if($peserta->matpel()->where('matpel_id',$request->matpel_id)->exists()){
            return redirect('/nilai')->with('error','Data nilai sudah ada!');
        };
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

    public function addpeserta(Request $request)
    {
        $matpel = Matpel::all();
        $data_peserta = Peserta::all();
        $kelompok = Matpel::find($request->matpel_id);
        if($kelompok->peserta()->where('peserta_id',$request->peserta_id)->exists()){
            return redirect('/pengajar/'.$request->matpel_id.'/lihatpeserta')->with('error','Peserta sudah ada!');
        };
        $nilai = Nilai::create($request->all());
        
        return redirect('/pengajar/'.$request->matpel_id.'/lihatpeserta')->with('sukses','Peserta berhasil ditambahkan!');
    }
}
