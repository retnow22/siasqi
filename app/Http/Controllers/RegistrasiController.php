<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Peserta;
Use App\Models\Pengajar;
Use App\Models\Kafalah;
use Illuminate\Support\Facades\DB;


class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('auth.register');
    }

    public function postregistrasi(Request $request)
    {
        //insert ke table Users
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->username = $request->nomor_induk;
        $user->password = bcrypt($request->password);
        $user->SetRememberToken( Str::random(60));
        $user->save();

        //insert ke table Pengajar
        if($request->role == 'Pengajar'){
            $request->request->add(['user_id'=>$user->id ]);
            $pengajar = Pengajar::create($request->all());

        //insert ke table Kafalah

        }
        //insert ke table Peserta
        else if($request->role == 'Peserta'){
            $request->request->add(['user_id'=>$user->id ]);
            $peserta = Peserta::create($request->all());

        
          
        }

        return view('auth.confirm-regist');

    }

    public function lihatakun(Request $request)
    {
        if($request->has('cari')){
            $users = \App\Models\User::where('name', 'LIKE','%'.$request->cari.'%')->orderBy('name', 'asc')->paginate(10);
        }else {
            $users = \App\Models\User::orderBy('name', 'asc')->paginate(10);           
        }
        
        return view('auth.akun',['users' => $users]);
    }

    public function tambahakun(Request $request)
    {
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->nama;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->SetRememberToken( Str::random(60));
        $user->save();

        return redirect('/lihatakun')->with('sukses','Akun berhasil ditambahkan!');
    }

    public function editakun($id)
    {
        $user = \App\Models\User::find($id);

        return view('auth.edit-akun', ['user' => $user]);
    }

    public function updateakun($id, Request $request)
    {
        $user = \App\Models\User::find($id);
        $user->update([
            'role' => $request->role,
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            ]);

        return redirect('/lihatakun')->with('sukses','Akun berhasil diperbaharui!');
    }

    public function deleteakun($id)
    {
        $user = \App\Models\User::find($id);

        $user->delete($user);

        return redirect('/lihatakun')->with('sukses','Akun berhasil dihapus!');
    }
    
}
