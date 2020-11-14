<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kafalah;
use App\Models\Presensi;
use App\Models\Pengajar;

class KafalahController extends Controller
{
    public function index(Request $request){
        $data_kafalah = Kafalah::all();
        if($request->has('cari')){
            $kafalah = Kafalah::where('%'.$data_kafalah->pengajar->nama.'%', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $kafalah = Kafalah::all();            
        }

        $data_pengajar = Pengajar::all();
        
        return view('kafalah.index', ['data_kafalah' => $data_kafalah, 'kafalah' => $kafalah, 'data_pengajar' => $data_pengajar]);
    }

    public function create(Request $request)
    {
        $pengajar = Presensi::where('semester', 'LIKE', '%'.$request->semester.'%')
        ->where('pengajar_id', 'LIKE','%'.$request->pengajar_id.'%')->get();

        $kehadiran = $pengajar->where('kehadiran', 'LIKE', 'Hadir');

        $jumlah_mengajar = count($kehadiran);

        $total_mengajar = $jumlah_mengajar + $request->badal;
       
        $total_pembayaran = $request->nominal * $total_mengajar;

        Kafalah::create([
            'semester' => $request->semester,
            'pengajar_id' => $request->pengajar_id,
            'jumlah_mengajar' => $jumlah_mengajar,
            'badal' => $request->badal,
            'nominal' => $request->nominal,
            'total_pembayaran' => $total_pembayaran,
        ]);

        return redirect('/kafalah')->with('sukses','Data kafalah pengajar berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $kafalah = Kafalah::find($id);
       
        return view('kafalah.edit', ['kafalah' => $kafalah]);
    }

    public function update(Request $request, $id)
    {
        $pengajar = Presensi::where('semester', 'LIKE', '%'.$request->semester.'%')
        ->where('pengajar_id', 'LIKE','%'.$request->pengajar_id.'%')->get();

        $kehadiran = $pengajar->where('kehadiran', 'LIKE', 'Hadir');

        $jumlah_mengajar = count($kehadiran);

        $total_mengajar = $jumlah_mengajar + $request->badal;
       
        $total_pembayaran = $request->nominal * $total_mengajar;

        $kafalah = Kafalah::find($id);
       
        $kafalah->update([
            'semester' => $request->semester,
            'jumlah_mengajar' => $jumlah_mengajar,
            'badal' => $request->badal,
            'nominal' => $request->nominal,
            'total_pembayaran' => $total_pembayaran,
        ]);
       
        return redirect('/kafalah')->with('sukses','Data kafalah berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $kafalah = Kafalah::find($id);
        $kafalah->delete($kafalah);
        return redirect('/kafalah')->with('sukses','Data kafalah pengajar berhasil dihapus!');
    }
}
