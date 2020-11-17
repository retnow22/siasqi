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
<h5 class="page-title"><i class="fa fa-money"></i> Data Pembayaran Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Pembayaran Peserta</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>          
                    <a href="/pembayaran/export-excel" class="btn btn-primary btn-xs">Eksport Data</a>
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
                            <th>Prodi/Angkatan</th>
                            <th>Semester</th>
                            <th>Nominal</th>
                            <th>Tanggal Pembayaran</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>

                        </thead>
                    </tr>
                    @foreach($data_pembayaran as $pembayaran)
                    <tr>
                        <td class="text-center"> {{ $pembayaran->peserta-> nomor_induk }} </td>
                        <td> {{ $pembayaran->peserta -> nama }} </td>
                        <td> {{ $pembayaran->peserta -> prodi }}/{{ $pembayaran->peserta -> angkatan }} </td>
                        <td class="text-center"> {{ $pembayaran -> semester }} </td>
                        <td class="text-center"> {{ $pembayaran -> nominal }} </td>
                        <td> {{ $pembayaran -> tgl_pembayaran }} </td>
                        <td class="text-center"> {{ $pembayaran -> keterangan }} </td>
                        <td> 
                        <a href="/pembayaran/{{$pembayaran->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/pembayaran/{{$pembayaran->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
    <br>
    <br>
    <br>
    <center>{{$data_pembayaran->links()}}</center>
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
        <form action="pembayaran/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                    <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama Peserta :</strong></label>
                        <div class="col-md-9">
                            <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required>
                            @foreach($data_peserta as $peserta)
                                <option value="{{$peserta->id}}">({{$peserta->nomor_induk}})-{{$peserta->nama}}- {{$peserta->prodi}}/{{$peserta->angkatan}}</option>
                            @endforeach
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
                        <label for="nominal" class="col-md-3 col-form-label text-right"><strong>Nominal :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nominal" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="tgl_pembayaran" class="col-md-3 col-form-label text-right"><strong>Tgl Pembayaran :</strong></label>
                        <div class="col-md-9">
                        <input data-date-format="yyyy-mm-dd" id="datepicker" name="tgl_pembayaran" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                        <div class="col-md-9">
                            <select id="keterangan" class="form-control form-control-sm" name="keterangan" required>
                                <option selected>Pilih</option>
                                <option value="Lunas">Lunas</option>
                                <option value="Belum Lunas">Belum Lunas</option>
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