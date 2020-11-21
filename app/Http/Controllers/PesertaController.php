<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\Peserta;
Use App\Models\Matpel;
Use App\Models\Nilai;
Use PDF;
Use Excel;
use App\Exports\PesertaExport;

class PesertaController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_peserta = Peserta::where('nama', 'LIKE','%'.$request->cari.'%')->orderBy('jenis_kelamin', 'asc')->orderBy('nama','asc')->paginate(10);
        }else {
            $data_peserta = Peserta::orderBy('jenis_kelamin', 'asc')->orderBy('nama','asc')->paginate(10);            
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
           'username' => $request->nomor_induk, 
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

    public function rencanastudi($id, Request $request)
    {
        $select_semester = Matpel::all();

        $peserta = Peserta::find($id);

        $semester = $request->semester;

        $matpel = $peserta->matpel;

        $matpel_exist = count($matpel->where('semester', '=', $semester));

        if($matpel_exist > 0){
                
            return view('peserta.rencana-studi-added');

        }

        if($request->has('semester')){

            $matpel = Matpel::where('semester', '=', $semester)->where('level','=',$peserta->level)->where('jenis_kelamin','=',$peserta->jenis_kelamin)->get();

            return view('peserta.rencana-studi', ['peserta' => $peserta, 'matpel' => $matpel, 'semester' => $semester]);
        }

        
        return view('peserta.rencana-studi', ['peserta' => $peserta, 'semester' => $semester, 'select_semester' => $select_semester]);

    }

    public function daftarstudi($id)
    {
        $peserta = Peserta::find($id);
        
 

        $matpel = Nilai::where('peserta_id','=',$peserta->id)->get();

        $peserta_id = count($matpel);

        if($peserta_id > 0){

        return view('peserta.daftar_studi', ['peserta' => $peserta]);
        };
        
        return view('peserta.daftar_kosong');
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

    public function exportexcel()
    {
        return Excel::download(new PesertaExport, 'Data Peserta.xlsx');
    }

}
