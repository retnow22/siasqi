@extends('layouts.app')

@section('content')
@if(session('sukses'))
            <div class="alert alert-success" role="alert">
            {{session('sukses')}}
            </div>
@endif
<h5 class="page-title"><i class="fa fa-user"></i> Pengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Pengajar</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>          
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead class="thead-dark">
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Fakultas</th>
                            <th>Instansi</th>
                            <th>Angkatan</th>
                            <th>Nomor HP</th>
                            <th>Jenis Kelamin</th>
                            <th>Level</th>
                            <th>Kode Pengajar</th>
                            <!-- <th>USER ID</th> -->
                            <th>Aksi</th>

                        </thead>
                    </tr>
                    @foreach($data_pengajar as $pengajar)
                    <tr>
                        <td class="text-center"> {{ $pengajar -> nip }} </td>
                        <td> {{ $pengajar -> nama }} </td>
                        <td class="text-center"> {{ $pengajar -> prodi }} </td>
                        <td class="text-center"> {{ $pengajar -> fakultas }} </td>
                        <td class="text-center"> {{ $pengajar -> instansi }} </td>
                        <td class="text-center"> {{ $pengajar -> angkatan }} </td>
                        <td> {{ $pengajar -> no_hp }} </td>
                        <td class="text-center"> {{ $pengajar -> jenis_kelamin }} </td>
                        <td class="text-center"> {{ $pengajar -> level }} </td>
                        <td class="text-center"> {{ $pengajar -> kode_pengajar }} </td>                        
                        <!-- <td> {{ $pengajar -> user_id }} </td> -->
                        <td> 
                        <a href="/pengajar/{{$pengajar->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/pengajar/{{$pengajar->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Pengajar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="pengajar/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="nis" class="col-md-3 col-form-label text-right"><strong>NIP :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nip" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama" class="col-md-3 col-form-label text-right"><strong>Nama :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nama" class="form-control form-control-sm" placeholder="">
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
                                <option selected>Pilih</option>
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
                        <label for="kode_pengajar" class="col-md-3 col-form-label text-right"><strong>Kode Pengajar :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="kode_pengajar" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="userid" class="col-md-3 col-form-label text-right"><strong>User Id :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="userid" class="form-control form-control-sm" placeholder="">
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