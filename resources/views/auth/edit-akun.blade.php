@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-user"></i> Edit Akun</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Akun</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/akun/{{$user->id}}/update" method="POST" >
                @csrf
                <div class="row">
                        <label for="nama" class="col-md-3 col-form-label text-right"><strong>Username :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nama" value="{{$user->name}}" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-md-3 col-form-label text-right"><strong>Alamat Email :</strong></label>
                        <div class="col-md-9">
                        <input type="email" name="email" value="{{$user->email}}" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="password" class="col-md-3 col-form-label text-right"><strong>Password :</strong></label>
                        <div class="col-md-9">
                        <input type="password" name="password" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                    <label for="role" class="col-md-3 col-form-label text-right"><strong>Role :</strong></label>
                        <div class="col-md-9">
                            <select id="role" class="form-control form-control-sm" name="role" required readonly>
                                <option value="{{$user->role}}" selected>{{$user->role}}</option>
                            </select>
                        </div>
                    </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/lihatakun" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Data akan diperbaharui')">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection