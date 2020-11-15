<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pengajar;
Use App\Models\Matpel;
Use App\Models\Presensi;

class PresensiController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){                
            $cari = Pengajar::where('nama', 'LIKE','%'.$request->cari.'%')->get();

            $pengajar_id = $cari->id;

            $presensi = Presensi::where('pengajar_id', 'LIKE','%'.$cari->id.'%')->get();
        }else {
            $presensi = Presensi::all();
        }

            $matpel = Matpel::all();

            $data_pengajar = Pengajar::all();
             
        return view('presensi.index', ['data_pengajar' => $data_pengajar, 'matpel' => $matpel, 'presensi' => $presensi]);
    }

    public function inputlaporan($id, Request $request)
    {
        if($request->has('cari')){
            $data_matpel = Matpel::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_matpel = Matpel::all();            
        }

            $pengajar = Pengajar::find($id);
            $matpel = $pengajar->matpel;

            // $data_pengajar = Pengajar::all();
            // $pembadal = $pengajar->presensi->where('pembadal_id', '>', '0');
            // dd($pembadal_id);
            // $nama_pembadal = Pengajar::find($pembadal_id);
             
        return view('presensi.input_laporan', ['data_matpel' => $data_matpel, 'pengajar' => $pengajar, 'matpel'=>$matpel, 'data_pengajar'=>$data_pengajar, 'nama_pembadal'=>$nama_pembadal]);
    }
    
    public function create(Request $request)
    {
        $idpengajar = auth()->user()->pengajar->id;

        $matpel = Matpel::find($request->matpel_id);

        $semester = $matpel->semester;

        $presensi = Presensi::create([
            'semester' =>$semester,
            'matpel_id'=>$request->matpel_id,
            'pengajar_id'=>$idpengajar,
            'tanggal'=>$request->tanggal,
            'pertemuan_ke'=>$request->pertemuan_ke,
            'kehadiran'=>$request->kehadiran,            
            'pembadal_id'=>$request->pembadal_id,
            'materi'=>$request->materi,
            'keterangan'=>$request->keterangan,
        ]);
        
        return redirect('/presensi/'.$idpengajar.'/input-laporan')->with('sukses','Data Laporan KBM berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $presensi = Presensi::find($id);
       
        return view('presensi.edit_laporan', ['presensi' => $presensi]);
    }

    public function update(Request $request, $id)
    {
        $presensi = Presensi::find($id);
       
        $presensi->update($request->all());
       
        $idpengajar = auth()->user()->pengajar->id;

        return redirect('/presensi/'.$idpengajar.'/input-laporan')->with('sukses','Data Laporan KBM berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $presensi = Presensi::find($id);

        $presensi->delete($presensi);

        $idpengajar = auth()->user()->pengajar->id;
       
        return redirect('/presensi/'.$idpengajar.'/input-laporan')->with('sukses','Data Laporan KBM berhasil dihapus!');
    }

}
