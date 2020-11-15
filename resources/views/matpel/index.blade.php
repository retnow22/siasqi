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
<h5 class="page-title"><i class="fa fa-book"></i> Data Mata Pelajaran</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Mata Pelajaran</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="row ">
                        <form class="form-inline my-2 my-lg-0" method="GET" action="/jadwal">
                        <input class="form-control " name="cari" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success " type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                </div>
                <div class="col-md-7"></div>
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
                        <thead>
                            <th>Kode</th>
                            <th>Mata Pelajaran</th>
                            <th>Semester</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Level</th>
                            <th>Kode Pengajar</th>
                            <th>Nama Pengajar</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($data_matpel as $matpel)
                    <tr>
                        <td class="text-center"> {{ $matpel -> kode }} </td>
                        <td> {{ $matpel -> nama }} </td>
                        <td class="text-center"> {{ $matpel -> semester }} </td>
                        <td class="text-center"> {{ $matpel -> hari }} </td>
                        <td class="text-center"> {{ $matpel -> waktu }} </td>
                        <td class="text-center"> {{ $matpel -> level }} </td>
                        <td class="text-center"> {{ $matpel->pengajar-> kode_pengajar }} </td>
                        <td> {{ $matpel->pengajar-> nama }} </td>
                        <td class="text-center"> {{ $matpel -> kuota }} </td>
                        <td>
                        <a href="/pengajar/{{$matpel->id}}/lihatpeserta" class="btn btn-primary btn-xs"><i class="fa fa-folder-open-o"></i></a> 
                        <a href="/jadwal/{{$matpel->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/jadwal/{{$matpel->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Mata Pelajaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="jadwal/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="kode" class="col-md-3 col-form-label text-right"><strong>Kode :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="kode" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="nama" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                        <div class="col-md-9">
                            <select id="nama" class="form-control form-control-sm" name="nama" required>
                                <option selected>Pilih</option>
                                <option value="Pra Tahsin 1 Buku Jilid 1.1">Pra Tahsin 1 Buku Jilid 1.1</option>
                                <option value="Pra Tahsin 2 Buku Jilid 1.2">Pra Tahsin 2 Buku Jilid 1.2</option>
                                <option value="Tahsin 1 Buku Jilid 2.1">Tahsin 1 Buku Jilid 2.1</option>
                                <option value="Tahsin 2 Buku Jilid 2.2">Tahsin 2 Buku Jilid 2.2</option>
                                <option value="Tahsin 3 Buku Jilid 3.1">Tahsin 3 Buku Jilid 3.1</option>
                                <option value="Tahsin 4 Buku Jilid 3.2">Tahsin 4 Buku Jilid 3.2</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="semester" class="col-md-3 col-form-label text-right"><strong>Semester :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="semester" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="hari" class="col-md-3 col-form-label text-right"><strong>Hari :</strong></label>
                        <div class="col-md-9">
                            <select id="hari" class="form-control form-control-sm" name="hari" required>
                                <option selected>Pilih</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="waktu" class="col-md-3 col-form-label text-right"><strong>Waktu :</strong></label>
                        <div class="col-md-9">
                            <select id="waktu" class="form-control form-control-sm" name="waktu" required>
                                <option selected>Pilih</option>
                                <option value="08.00-10.00">08.00-10.00</option>
                                <option value="10.00-12.00">10.00-12.00</option>                                
                                <option value="13.00-15.00">13.00-15.00</option>
                                <option value="16.00-18.00">16.00-18.00</option>
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
                        <label for="kuota" class="col-md-3 col-form-label text-right"><strong>Kuota :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="kuota" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                    <label for="pengajar_id" class="col-md-3 col-form-label text-right"><strong>Nama Pengajar :</strong></label>
                        <div class="col-md-9">
                            <select id="pengajar_id" class="form-control form-control-sm" name="pengajar_id" required>
                            @foreach($data_pengajar as $pengajar)
                                <option value="{{$pengajar->id}}">(@php $level=$pengajar->level @endphp
                                @if ($level == 1)
                                        Pra Tahsin 1
                                    @elseif($level == 2)
                                        Pra Tahsin 2
                                    @elseif($level == 3)
                                        Tahsin 1
                                    @elseif($level == 4)
                                        Tahsin 2
                                    @elseif($level == 5)
                                        Tahsin 3
                                    @elseif($level == 6)
                                        Tahsin 4
                                    @endif)-({{$pengajar->kode_pengajar}})-{{$pengajar->nama}}</option>
                            @endforeach
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