<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kafalah;
use App\Models\Presensi;
use App\Models\Pengajar;
use App\Exports\KafalahExport;
use Excel;

class KafalahController extends Controller
{
    public function index(){

        $kafalah = Kafalah::orderBy('semester', 'desc')->paginate(10);            

        $data_pengajar = Pengajar::all();
        
        return view('kafalah.index', ['kafalah' => $kafalah, 'data_pengajar' => $data_pengajar]);
    }

    public function create(Request $request)
    {
        //Menghitung jumlah mengajar
        $pengajar = Presensi::where('semester', 'LIKE', '%'.$request->semester.'%')
        ->where('pengajar_id', 'LIKE','%'.$request->pengajar_id.'%')->get();

        $kehadiran = $pengajar->where('kehadiran', 'LIKE', 'Hadir');

        $jumlah_mengajar = count($kehadiran);

        //Menghitung jumlah membadal
        $nama_pengajar = Pengajar::find($request->pengajar_id)->nama;

        $membadal = Presensi::where('semester', 'LIKE', '%'.$request->semester.'%')
        ->where('pembadal', 'LIKE', '%'.$nama_pengajar.'%')->get();

        $jumlah_membadal = count($membadal);

        $total_mengajar = $jumlah_mengajar + $jumlah_membadal;
       
        $total_pembayaran = $request->nominal * $total_mengajar;

        Kafalah::create([
            'semester' => $request->semester,
            'pengajar_id' => $request->pengajar_id,
            'jumlah_mengajar' => $jumlah_mengajar,
            'badal' => $jumlah_membadal,
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

    public function exportexcel()
    {
        return Excel::download(new KafalahExport, 'Data Kafalah.xlsx');
    }
}
