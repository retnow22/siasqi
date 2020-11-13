<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peserta;
use App\Models\Pembayaran;

class PembayaranController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('cari')){
            $data_peserta = Peserta::where('nama', 'LIKE','%'.$request->cari.'%')->get();
        }else {
            $data_peserta = Peserta::all();            
        }

        $data_pembayaran = Pembayaran::all();
             
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
}
