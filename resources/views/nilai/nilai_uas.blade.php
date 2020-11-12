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
<h5 class="page-title"><i class="fa fa-graduation-cap"></i> Nilai UAS Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Nilai UAS Peserta</h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-10"></div>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNilai">
                    <i class="fa fa-plus"></i> Tambah Nilai
                    </button>          
                </div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                    <thead>
                        <th>Semester</th>
                        <th>NIS</th>
                        <th>Nama Peserta</th>
                        <th>Kode MP</th>
                        <th>Mata Pelajaran</th>
                        <th>Nilai Lisan</th>
                        <th>Nilai Teori</th>
                        <th>Nilai Akhir</th>
                        <th>KKM</th>
                        <th>Keterangan</th>
                        <th>Penguji</th>
                        <th>Aksi</th>
                    </thead>
                    </tr>
                    @foreach($nilai as $nilai)
                    <tr>
                        <td>{{ $nilai->matpel->semester }}</td>
                        <td class="text-center">{{ $nilai->peserta -> nomor_induk }}</td>
                        <td>{{ $nilai->peserta -> nama }}</td>
                        <td class="text-center">{{ $nilai->matpel-> kode }}</td>
                        <td class="text-center">{{ $nilai->matpel-> nama }}</td>
                        <td class="text-center">{{ $nilai-> nilai_lisan }}</td>
                        <td> {{ $nilai-> nilai_teori }}</td>
                        <td class="text-center text-primary"><strong>{{ $nilai-> nilai_akhir }}</strong></td>
                        <td class="text-center">{{ $nilai-> kkm }}</td>
                        <td class="text-center">{{ $nilai-> keterangan }}</td>
                        <td class="text-center">{{ $nilai-> penguji}}</td>
                        <td> 
                        <a href="/nilai/{{$nilai->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/nilai/{{$nilai->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
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
 <div class="modal fade" id="addNilai" tabindex="-1" role="dialog" aria-labelledby="addNilaiLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addNilaiLabel">Tambah Nilai Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/nilai/create" method="POST" >
            @csrf 
            <div class="row">
            <label for="matpel_id" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                <div class="col-md-9">
                    <select id="matpel_id" class="form-control form-control-sm" name="matpel_id" required>
                    <option value="" selected>pilih</option>
                    @foreach($matpel as $mp)
                        <option value="{{$mp->id}}">({{$mp->kode}})-{{$mp->nama}}</option>
                    @endforeach
                    </select>
                </div>
            </div>                   
            <div class="row">
            <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama Peserta :</strong></label>
                <div class="col-md-9">
                    <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required>
                    @foreach($data_peserta as $peserta)
                        <option value="{{$peserta->id}}">({{$peserta->nomor_induk}})-{{$peserta->nama}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <label for="nilai_lisan" class="col-md-3 col-form-label text-right"><strong>Nilai Lisan :</strong></label>
                <div class="col-md-9">
                <input type="text" name="nilai_lisan" class="form-control form-control-sm" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="nilai_teori" class="col-md-3 col-form-label text-right"><strong>Nilai Teori :</strong></label>
                <div class="col-md-9">
                <input type="text" name="nilai_teori" class="form-control form-control-sm" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="nilai_akhir" class="col-md-3 col-form-label text-right"><strong>Nilai Akhir :</strong></label>
                <div class="col-md-9">
                <input type="text" name="nilai_akhir" class="form-control form-control-sm" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="kkm" class="col-md-3 col-form-label text-right"><strong>KKM :</strong></label>
                <div class="col-md-9">
                <input type="text" name="kkm" class="form-control form-control-sm" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                <div class="col-md-9">
                    <select id="keterangan" class="form-control form-control-sm" name="keterangan" required>
                        <option selected>Pilih</option>
                        <option value="Lulus">Lulus</option>
                        <option value="Belum Lulus">Belum Lulus</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <label for="penguji" class="col-md-3 col-form-label text-right"><strong>Penguji :</strong></label>
                <div class="col-md-9">
                <input type="text" name="penguji" class="form-control form-control-sm" placeholder="">
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