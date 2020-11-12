@extends('layouts.app')

@section('content')
@if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
@endif
@if(session('error'))
            <div class="alert alert-danger" role="alert">
            {{session('error')}}
            </div>
@endif
<h5 class="page-title"><i class="fa fa-user"></i> Kelola Akun</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Kelola Akun</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Akun
                    </button>          
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead class="thead-dark">
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($user as $user)
                    <tr>
                        <td> {{ $user -> name }} </td>
                        <td> {{ $user -> username }} </td>
                        <td> {{ $user -> email }} </td>
                        <td> {{ $user -> password }} </td>
                        <td class="text-center"> {{ $user -> role }} </td>
                        <td>
                        <a href="/akun/{{$user->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/akun/{{$user->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/tambahakun" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="nama" class="col-md-3 col-form-label text-right"><strong>Nama :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="username" class="col-md-3 col-form-label text-right"><strong>Username :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="username" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-md-3 col-form-label text-right"><strong>Alamat Email :</strong></label>
                        <div class="col-md-9">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="">
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
                            <select id="role" class="form-control form-control-sm" name="role" required>
                                <option value="" selected>Pilih</option>
                                <option value="Admin">Admin</option>
                                <option value="Pengajar">Pengajar</option>
                                <option value="Peserta">Peserta</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>                
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
    </div>
    </form>
    </div>
</div>
</div>

@stop