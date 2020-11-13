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
<h5 class="page-title"><i class="fa fa-group"></i><a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal"> Jadwal Mengajar</a> / Presensi Peserta</h5> 
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Presensi Peserta</h3>
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
                        <dd class="col-sm-8"> ({{$rombel->kode}}) - {{$rombel->nama}}</dd>
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
                            <th>Prodi/Angkatan</th>
                            <th>Pertemuan 1</th>
                            <th>Pertemuan 2</th>
                            <th>Pertemuan 3</th>
                            <th>Pertemuan 4</th>
                            <th>Pertemuan 5</th>
                            <th>Pertemuan 6</th>
                            <th>Pertemuan 7</th>
                            <th>Pertemuan 8</th>
                            <th>Pertemuan 9</th>
                            <th>Pertemuan 10</th>
                            <th>Pertemuan 11</th>
                            <th>Pertemuan 12</th>                            
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($rombel->peserta as $key => $peserta)
                    <tr>
                        <td scope="row"> {{ $key + 1 }}</td>
                        <td class="text-center"> {{ $peserta -> nomor_induk }} </td>
                        <td> {{ $peserta -> nama }} </td>
                        <td class="text-center"> {{ $peserta -> prodi }}/ {{ $peserta -> angkatan }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan1 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan2 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan3 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan4 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan5 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan6 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan7 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan8 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan9 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan10 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan11 }} </td>
                        <td class="text-center"> {{ $peserta->pivot -> pertemuan12 }} </td>
                        <td>
                        <a href="/pengajar/{{$peserta->pivot->id}}/inputpresensi" class="btn btn-primary btn-xs"><i class="lnr lnr-pencil"></i></a>                         
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