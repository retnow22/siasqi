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
        //insert ke table Users
        $user = new \App\Models\User;
        $user->role = 'Peserta';
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt('12345678');
        $user->save();

        //insert ke table Peserta
        $request->request->add(['user_id'=>$user->id ]);
        $peserta = Peserta::create($request->all());
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

    public function nilai($id)
    {
        $nilai_peserta = Peserta::find($id);
        // dd($nilai_peserta);

        return view('peserta.hasil_studi', ['nilai_peserta' => $nilai_peserta]);
    }

    public function profil($id)
    {
        $peserta = Peserta::find($id);

        return view('peserta.profil', ['peserta'=>$peserta]);
    }

    public function updateprofil($id, Request $request)
    {
        $peserta = Peserta::find($id);
      
        $peserta->update($request->all());
  
        return view('peserta.profil', ['peserta'=> $peserta])
                        ->with('success','Biodata berhasil diperbarui!');

    }
}
