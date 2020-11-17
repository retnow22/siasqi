<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Pembayaran;
Use Excel;
use App\Exports\PembayaranExport;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_peserta = Peserta::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_peserta = Peserta::all();            
        }

        $data_pembayaran = Pembayaran::orderBy('tgl_pembayaran', 'desc')->paginate(10);
             
        return view('pembayaran.index', ['data_peserta' => $data_peserta, 'data_pembayaran' => $data_pembayaran]);
    }
    
    public function create(Request $request)
    {
        $data_peserta = Peserta::all();
        $pembayaran = Pembayaran::create($request->all());
        
        return redirect('/pembayaran')->with('sukses','Data pembayaran berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
       
        return view('pembayaran.edit', ['pembayaran' => $pembayaran]);
    }

    public function update(Request $request, $id)
    {
        $pembayaran = Pembayaran::find($id);
       
        $pembayaran->update($request->all());
       
        return redirect('/pembayaran')->with('sukses','Data pembayaran berhasil diperbaharui!');
    }

    public function delete($id)
    {
        $pembayaran = Pembayaran::find($id);

        $pembayaran->delete($pembayaran);
       
        return redirect('/pembayaran')->with('sukses','Data pembayaran berhasil dihapus!');
    }

    public function exportexcel()
    {
        return Excel::download(new PembayaranExport, 'Data Pembayaran Peserta.xlsx');
    }
}
