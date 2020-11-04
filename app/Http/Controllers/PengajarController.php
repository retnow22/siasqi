<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pengajar;

class PengajarController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_pengajar = Pengajar::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_pengajar = Pengajar::all();            
        }
        
        return view('pengajar.index', ['data_pengajar' => $data_pengajar]);
    }
    
    public function create(Request $request)
    {
        Pengajar::create($request->all());

        return redirect('/pengajar')->with('sukses','Data berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pengajar = Pengajar::find($id);
       
        return view('pengajar.edit', ['pengajar' => $pengajar]);
    }

    public function update(Request $request, $id)
    {
        $pengajar = Pengajar::find($id);
       
        $pengajar->update($request->all());
       
        return redirect('/pengajar')->with('sukses','Data berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $pengajar = Pengajar::find($id);

        $pengajar->delete($pengajar);
       
        return redirect('/pengajar')->with('sukses','Data berhasil dihapus!');
    }
}