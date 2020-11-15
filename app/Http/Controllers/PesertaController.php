<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;
Use App\Models\Matpel;
Use App\Models\Nilai;
Use PDF;

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
        $user->username = $request->nomor_induk;
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

        $userid = $peserta->user->id;

        $user = \App\Models\User::find($userid);

        $user->update([
           'name' => $request->nama, 
        ]);
       
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
        $idpeserta = auth()->user()->peserta->id;

        $peserta = Peserta::find($id);

        $userid = auth()->user()->id;

        $user = \App\Models\User::find($userid);

        $user->update([
           'name' => $request->nama, 
        ]);
        
        $peserta->update($request->all());
  
        return redirect('/peserta/'.$idpeserta.'/profil')
                        ->with('sukses','Biodata berhasil diperbarui!');

    }

    public function rencanastudi($id)
    {
        $peserta = Peserta::find($id);
        
        $matpel = Matpel::where('level','=',$peserta->level)->get();
        
        return view('peserta.rencana-studi', ['peserta' => $peserta, 'matpel' => $matpel]);

    }

    public function daftarstudi($id)
    {
        $peserta = Peserta::find($id);

        return view('peserta.daftar_studi', ['peserta' => $peserta]);
    }

    public function pilihmatpel($id)
    {
        $peserta = Peserta::find(auth()->user()->peserta->id);
        
        $peserta->matpel()->attach($id);

        return view('peserta.daftar_studi', ['peserta' => $peserta]);

    }

    public function pembayaran($id)
    {
        $pembayaran_peserta = Peserta::find($id);

        return view('peserta.pembayaran', ['pembayaran_peserta' => $pembayaran_peserta]);
    }

    public function presensi($id)
    {
        $presensi = Peserta::find($id);

        return view('peserta.presensi', ['presensi' => $presensi]);
    }

    public function cetaknilai($id)
    {
        $nilai = Nilai::find($id);

        $peserta = $nilai->peserta;
  
        $pdf = PDF::loadView('peserta.cetak_nilai', ['nilai' => $nilai, 'peserta' => $peserta]);
        
        return $pdf->stream('KHS '.$nilai->matpel->semester.' ('.$peserta->nomor_induk.' - '.$peserta->nama.') .pdf');

    }

    public function inputeval($id, Request $request)
    {
        $idpeserta = auth()->user()->peserta->id;

        $evaluasi = Nilai::find($id);

        $evaluasi->update($request->all());

        return redirect('/peserta/'.$idpeserta.'/daftar-studi')
                ->with('sukses','Evaluasi berhasil diinput!');
    }

}
