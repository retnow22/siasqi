<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;
Use App\Models\Matpel;
Use App\Models\Nilai;
use App\Exports\RombelExport;
use Excel;


class NilaiController extends Controller
{
    public function index(Request $request)
    {

        $data_peserta = Peserta::all();  

        $matpel = Matpel::all();

        $nilai = Nilai::orderBy('matpel_id', 'desc')->paginate(10);
        
             
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

    public function deletepeserta($id)
    {
        $peserta = Nilai::find($id);

        $peserta->delete($peserta);
       
        return redirect('/pengajar/'.$peserta->matpel_id.'/lihatpeserta')->with('sukses','Peserta berhasil dihapus!');
    }

    public function rekapeval()
    {
        $evaluasi_pengajar = Matpel::whereNotNull('evaluasi')->get();

        $evaluasi_peserta = Nilai::whereNotNull('evaluasi')->get();

        return view('informasi.evaluasi', ['evaluasi_pengajar' => $evaluasi_pengajar, 'evaluasi_peserta' => $evaluasi_peserta]);
    }

    public function exportexcel()
    {
        return Excel::download(new RombelExport, 'Data Rombel.xlsx');
    }
}
