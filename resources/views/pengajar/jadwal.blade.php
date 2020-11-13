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
<h5 class="page-title"><i class="fa fa-calendar"></i> Jadwal Mengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="row"> 
            <p>
            <dl class="row">
                <div class="col-md-6">
                <div class="row">
                    <dt class="col-sm-4 text-right">Nomor Induk :</dt>
                    <dd class="col-sm-8">{{auth()->user()->pengajar->nomor_induk}}</dd>
                    <dt class="col-sm-4 text-right">Level :</dt>
                    <dd class="col-sm-8">
                        @php $level = auth()->user()->pengajar->level @endphp
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
                        @endif
                    </dd>
                    <dt class="col-sm-4 text-right">Kode Pengajar :</dt>
                    <dd class="col-sm-8">{{auth()->user()->pengajar->kode_pengajar}}</dd>
                </div>
                </div>
            </dl>
        </p>
        <br>
        <h3 class="text-primary">Jadwal Mengajar</h3>
        <br>
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead>
                            <th>Kode MP</th>
                            <th>Mata Pelajaran</th>
                            <th>Semester</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Level</th>
                            <th>Kuota</th>
                            <th>Aksi</th>
                        </thead>
                    </tr>
                    @foreach($jadwal->matpel as $pengajar)
                    <tr>
                        <td class="text-center"> {{ $pengajar -> kode }} </td>
                        <td> {{ $pengajar -> nama }} </td>
                        <td class="text-center"> {{ $pengajar -> semester }} </td>
                        <td class="text-center"> {{ $pengajar -> hari }} </td>
                        <td class="text-center"> {{ $pengajar -> waktu }} </td>
                        <td class="text-center"> {{ $pengajar -> level }} </td>
                        <td class="text-center"> {{ $pengajar -> kuota }} </td>
                        <td>
                        <a href="/pengajar/{{$pengajar->id}}/lihatpeserta" class="btn btn-primary btn-xs">Lihat Peserta</a>
                        <a href="/pengajar/{{$pengajar->id}}/lihatpresensi" class="btn btn-primary btn-xs">Input Presensi</a>   
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