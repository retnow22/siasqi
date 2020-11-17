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
<h5 class="page-title"><i class="fa fa-envelope"></i> Data Kafalah Pengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Kafalah Pengajar</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-9"></div>
                <div class="col-md-3">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Tambah Data
                    </button>
                    <a href="/kafalah/export-excel" class="btn btn-primary btn-xs">Eksport Data</a>           
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead>
                            <th>Semester</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Nominal</th>
                            <th>Jumlah Mengajar</th>
                            <th>Jumlah Membadalkan</th>                            
                            <th>Total Pembayaran</th>
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($kafalah as $k)
                    <tr>
                        <td> {{ $k -> semester }} </td>
                        <td> {{ $k->pengajar -> nomor_induk }} </td>
                        <td> {{ $k->pengajar -> nama }} </td>
                        <td class="text-center"> {{ $k -> nominal }} </td>
                        <td class="text-center"> {{ $k -> jumlah_mengajar }} </td>
                        <td class="text-center"> {{ $k -> badal }} </td>
                        <td class="text-center"><span class="money"> {{ $k -> total_pembayaran }} </span></td>
                        <td>
                        <a href="/kafalah/{{$k->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/kafalah/{{$k->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
                        </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
    <br>
    <br>
    <br>
    <center>{{$kafalah->links()}}</center>
        </div>
    </div>
    </div>
</div>

 <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kafalah</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="kafalah/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="semester" class="col-md-3 col-form-label text-right"><strong>Semester :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="semester" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                    <label for="pengajar_id" class="col-md-3 col-form-label text-right"><strong>Nama Pengajar :</strong></label>
                        <div class="col-md-9">
                            <select id="pengajar_id" class="form-control form-control-sm" name="pengajar_id" required>
                            @foreach($data_pengajar as $pengajar)
                                <option value="{{$pengajar->id}}">({{$pengajar->nomor_induk}})-{{$pengajar->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="nominal" class="col-md-3 col-form-label text-right"><strong>Nominal :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="nominal" class="form-control form-control-sm" placeholder="">
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