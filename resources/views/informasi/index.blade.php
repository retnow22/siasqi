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
<h5 class="page-title"><i class="fa fa-bullhorn"></i> Data Informasi Kegiatan QI</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Informasi Kegiatan QI</h3>
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
                        <thead>
                            <th>Label</th>
                            <th>Deskripsi</th>
                            <th>Pelaksana</th>
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($informasi as $info)
                    <tr>
                        <td> {{ $info -> label }} </td>
                        <td> {{ $info -> deskripsi }} </td>
                        <td class="text-center"> {{ $info -> pelaksana }} </td>
                        <td>
                        <a href="/informasi/{{$info->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/informasi/{{$info->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
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
        <form action="informasi/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <label for="label" class="col-md-3 col-form-label text-right"><strong>Label :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="label" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="deskripsi" class="col-md-3 col-form-label text-right"><strong>Deskripsi :</strong></label>
                        <div class="col-md-9">
                        <textarea class="form-control form-control-sm" name="deskripsi" placeholder="" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <label for="pelaksana" class="col-md-3 col-form-label text-right"><strong>Pelaksana :</strong></label>
                        <div class="col-md-9">
                            <select id="pelaksana" class="form-control form-control-sm" name="pelaksana" required>
                                <option value="">Pilih</option>
                                <option value="SQI">SQI</option>
                                <option value="QI">QI</option>
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