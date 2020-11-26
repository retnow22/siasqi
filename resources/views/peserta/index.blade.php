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
<h5 class="page-title"><i class="fa fa-user"></i> Data Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Peserta</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                <div class="row ">
                    <form class="form-inline my-2 my-lg-0" method="GET" action="/peserta">
                    <input class="form-control " name="cari" type="search" placeholder="Cari berdasarkan nama" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                </div>
                <div class="col-md-6"></div>
                <div class="col-md-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    <a href="/peserta/export-excel" class="btn btn-primary btn-xs">Eksport Data</a>          
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                    <thead>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Prodi</th>
                        <th>Fakultas</th>
                        <th>Instansi</th>
                        <th>Angkatan</th>
                        <th>Nomor HP</th>
                        <th>Jenis Kelamin</th>
                        <th>Level</th>
                        <th>Semester Masuk</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </thead>
                    </tr>
                    @foreach($data_peserta as $peserta)
                    <tr>
                        <td class="text-center"> {{ $peserta -> nomor_induk }} </td>
                        <td> {{ $peserta -> nama }} </td>
                        <td class="text-center"> {{ $peserta -> prodi }} </td>
                        <td class="text-center"> {{ $peserta -> fakultas }} </td>
                        <td class="text-center"> {{ $peserta -> instansi }} </td>
                        <td class="text-center"> {{ $peserta -> angkatan }} </td>
                        <td> {{ $peserta -> no_hp }} </td>
                        <td class="text-center"> {{ $peserta -> jenis_kelamin }} </td>
                        <td class="text-center"> {{ $peserta -> level }} </td>
                        <td class="text-center"> {{ $peserta -> semester_masuk }} </td>
                        <td class="text-center"> {{ $peserta -> status }} </td>
                        <td> 
                        <a href="/peserta/{{$peserta->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/peserta/{{$peserta->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
    <br>
    <br>
    <br>
    <center>{{$data_peserta->links()}}</center>
        </div>
    </div>
    </div>
</div>

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="peserta/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="nomor_induk" class="col-md-3 col-form-label text-right"><strong>NIS :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nomor_induk" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama" class="col-md-3 col-form-label text-right"><strong>Nama :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="email" class="col-md-3 col-form-label text-right"><strong>Alamat Email :</strong></label>
                        <div class="col-md-9">
                        <input type="email" name="email" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="prodi" class="col-md-3 col-form-label text-right"><strong>Prodi :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="prodi" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="fakultas" class="col-md-3 col-form-label text-right"><strong>Fakultas :</strong></label>
                        <div class="col-md-9">
                            <select id="fakultas" class="form-control form-control-sm" name="fakultas" required>
                                <option selected>Pilih</option>
                                <option value="FIP">FIP</option>
                                <option value="FT">FT</option>
                                <option value="FMIPA">FMIPA</option>
                                <option value="FE">FE</option>
                                <option value="FBS">FBS</option>
                                <option value="FIS">FIS</option>
                                <option value="FIK">FIK</option>
                                <option value="FPPsi">FPPsi</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="instansi" class="col-md-3 col-form-label text-right"><strong>Instansi :</strong></label>
                        <div class="col-md-9">
                            <select id="instansi" class="form-control form-control-sm" name="instansi" required>
                                <option selected>Pilih</option>
                                <option value="UNJ">UNJ</option>
                                <option value="Umum">Umum</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="angkatan" class="col-md-3 col-form-label text-right"><strong>Angkatan :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="angkatan" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="no_hp" class="col-md-3 col-form-label text-right"><strong>No Hp :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="no_hp" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="jenis_kelamin" class="col-md-3 col-form-label text-right"><strong>Jenis Kelamin :</strong></label>
                        <div class="col-md-9">
                            <select id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin" required>
                                <option selected>Pilih</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="level" class="col-md-3 col-form-label text-right"><strong>Level :</strong></label>
                        <div class="col-md-9">
                            <select id="level" class="form-control form-control-sm" name="level" required>
                                <option value="0" selected>Pilih</option>
                                <option value="1">Pra Tahsin 1</option>
                                <option value="2">Pra Tahsin 2</option>
                                <option value="3">Tahsin 1</option>
                                <option value="4">Tahsin 2</option>
                                <option value="5">Tahsin 3</option>
                                <option value="6">Tahsin 4</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="semester_masuk" class="col-md-3 col-form-label text-right"><strong>Semester Masuk :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="semester_masuk" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="status" class="col-md-3 col-form-label text-right"><strong>Status :</strong></label>
                        <div class="col-md-9">
                            <select id="status" class="form-control form-control-sm" name="status" required>
                                <option selected>Pilih</option>
                                <option value="Aktif">Aktif</option>
                                <option value="Non Aktif">Non Aktif</option>
                                <option value="Lulus">Lulus</option>
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