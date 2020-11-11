<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
Use App\Models\Peserta;
Use App\Models\Pengajar;



class RegistrasiController extends Controller
{
    public function registrasi()
    {
        return view('auth.register');
    }

    public function postregistrasi(Request $request)
    {
        // dd($request->all());
        //insert ke table Users
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->SetRememberToken( Str::random(60));
        $user->save();

        //insert ke table Pengajar
        if($request->role == 'Pengajar'){
            $request->request->add(['user_id'=>$user->id ]);
            $pengajar = Pengajar::create($request->all());

        }
        //insert ke table Peserta
        else if($request->role == 'Peserta'){
            $request->request->add(['user_id'=>$user->id ]);
            $peserta = Peserta::create($request->all());
          
        }

        return view('auth.confirm-regist');

    }

    public function lihatakun()
    {
        $user = \App\Models\User::all();

        return view('auth.akun',['user' => $user]);
    }

    public function tambahakun(Request $request)
    {
        $user = new \App\Models\User;
        $user->role = $request->role;
        $user->name = $request->nama;
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
