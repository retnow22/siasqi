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
<h5 class="page-title"><i class="fa fa-group"></i><a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal"> Jadwal Mengajar</a> / Data Rombel</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Rombel</h3>
            <div class="right">
                <a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal" class="btn btn-default btn-xs">Tutup</a>
            </div>
        </div>
        <div class="panel-body">
            <div class="row"> 
            <p>
                <dl class="row">
                    <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-4 text-right">Semester :</dt>
                        <dd class="col-sm-8">{{$rombel->semester}}</dd>
                        <dt class="col-sm-4 text-right">Level :</dt>
                        <dd class="col-sm-8">{{$rombel->level}}</dd>
                        <dt class="col-sm-4 text-right">Mata Pelajaran :</dt>
                        <dd class="col-sm-8">{{$rombel->nama}}</dd>
                        <dt class="col-sm-4 text-right">Hari :</dt>
                        <dd class="col-sm-8">{{$rombel->hari}}</dd>
                        <dt class="col-sm-4 text-right">Waktu :</dt>
                        <dd class="col-sm-8">{{$rombel->waktu}}</dd>
                    </div>
                    </div>
                </dl>
            </p>
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead>
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Fakultas</th>
                            <th>Instansi</th>
                            <th>Angkatan</th>
                            <th>Nomor HP</th>
                            <th>Nilai Lisan</th>
                            <th>Nilai Teori</th>
                            <th>Nilai Akhir</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>

                        </thead>
                    </tr>
                    @foreach($rombel->peserta as $key => $peserta)
                    <tr>
                        <td scope="row"> {{ $key + 1 }}</td>
                        <td class="text-center"> {{ $peserta -> nis }} </td>
                        <td> {{ $peserta -> nama }} </td>
                        <td class="text-center"> {{ $peserta -> prodi }} </td>
                        <td class="text-center"> {{ $peserta -> fakultas }} </td>
                        <td class="text-center"> {{ $peserta -> instansi }} </td>
                        <td class="text-center"> {{ $peserta -> angkatan }} </td>
                        <td class="text-center"> {{ $peserta -> no_hp }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_lisan }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_teori }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_akhir }} </td>
                        <td class="text-center"> {{ $peserta->pivot->keterangan }} </td>
                        <td> 
                        <a href="/pengajar/{{$peserta->pivot->id}}/inputnilai" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>                       
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

@stop