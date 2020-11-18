<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Matpel;
Use App\Models\Pengajar;

class MatpelController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_matpel = Matpel::where('nama', 'LIKE','%'.$request->cari.'%')->orderBy('jenis_kelamin','asc')->orderBy('id','desc')->paginate(10);
        }else {
            $data_matpel = Matpel::orderBy('jenis_kelamin','asc')->orderBy('id','desc')->paginate(10);            
        }

        $data_pengajar = Pengajar::all();
        
        return view('matpel.index', ['data_matpel' => $data_matpel, 'data_pengajar' => $data_pengajar]);
    }

    public function create(Request $request)
    {
        $jenis_kelamin = Pengajar::find($request->pengajar_id)->jenis_kelamin;
        
        Matpel::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'semester' => $request->semester,
            'hari' => $request->hari,
            'waktu' => $request->waktu,
            'level' => $request->level,
            'kuota' => $request->kuota,
            'pengajar_id' => $request->pengajar_id,
            'jenis_kelamin' => $jenis_kelamin,
        ]);

        return redirect('/jadwal')->with('sukses','Data Mata Pelajaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $matpel = Matpel::find($id);
        $data_pengajar = Pengajar::all();
       
        return view('matpel.edit', ['matpel' => $matpel, 'data_pengajar' => $data_pengajar]);
    }

    public function update(Request $request, $id)
    {
        $matpel = Matpel::find($id);
       
        $matpel->update($request->all());
       
        return redirect('/jadwal')->with('sukses','Data berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $matpel = Matpel::find($id);

        $matpel->delete($matpel);
       
        return redirect('/jadwal')->with('sukses','Data berhasil dihapus!');
    }

}
