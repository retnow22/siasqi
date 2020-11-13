<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Pengajar;
Use App\Models\Matpel;
Use App\Models\Peserta;
Use App\Models\Nilai;

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

         //insert ke table Users
         $user = new \App\Models\User;
         $user->role = 'Pengajar';
         $user->name = $request->nama;
         $user->username = $request->nomor_induk;
         $user->email = $request->email;
         $user->password = bcrypt('12345678');
         $user->save();
 
         //insert ke table Pengajar
         $request->request->add(['user_id'=>$user->id ]);
         $pengajar = Pengajar::create($request->all());
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

    public function profil($id)
    {
        $pengajar = Pengajar::find($id);

        return view('pengajar.profil', ['pengajar'=>$pengajar]);
    }

    public function updateprofil($id, Request $request)
    {
        $pengajar = Pengajar::find($id);
        // dd($request->all());
        $pengajar->update($request->all());
  
        return view('pengajar.profil', ['pengajar'=> $pengajar])
                        ->with('success','Biodata berhasil diperbarui!');

    }

    public function jadwal($id)
    {
        $jadwal = Pengajar::find($id);
        // dd($nilai_peserta);

        return view('pengajar.jadwal', ['jadwal' => $jadwal]);
    }

    public function lihatpeserta($id)
    {
        $data_peserta = Peserta::all();
        $matpel = Matpel::all();
        $rombel = Matpel::find($id);
        return view('pengajar.rombel', ['rombel' => $rombel, 'matpel' => $matpel, 'data_peserta' => $data_peserta]);
    }

    public function inputnilai($id)
    {
        $nilai = Nilai::find($id);
       
        return view('pengajar.input-nilai', ['nilai' => $nilai]);
    }

    public function updatenilai(Request $request, $id)
    {
        $nilai = Nilai::find($id);

        $nilai->update($request->all());
       
        return redirect('/pengajar/'.$id.'/lihatpeserta')->with('sukses','Data nilai berhasil diperbaharui!');
    }

    public function lihatPresensi($id)
    {
        $data_peserta = Peserta::all();
        $matpel = Matpel::all();
        $rombel = Matpel::find($id);

        return view('presensi.peserta', ['rombel' => $rombel, 'matpel' => $matpel, 'data_peserta' => $data_peserta]);
    }

    public function inputPresensi($id)
    {
        $nilai = Nilai::find($id);
       
        return view('presensi.input_presensi', ['nilai' => $nilai]);
    }

    public function updatePresensi(Request $request, $id)
    {
        $nilai = Nilai::find($id);

        $nilai->update($request->all());
       
        return redirect('/pengajar/'.$id.'/lihatpresensi')->with('sukses','Data presensi berhasil diperbaharui!');
    } 

}
