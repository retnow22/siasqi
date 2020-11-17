@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-tasks"></i> Data Laporan KBM</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Laporan KBM</h3>
        </div>
        <div class="panel-body">
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                    <thead>
                        <th>Semester</th>
                        <th>Kode MP</th>
                        <th>Mata Pelajaran</th>
                        <th>Kode Pengajar</th>
                        <th>Nama Pengajar</th>
                        <th>Pertemuan ke</th>
                        <th>Tanggal</th>
                        <th>Kehadiran</th>
                        <th>Pembadal</th>
                        <th>Materi</th>
                        <th>Keterangan</th>
                    </thead>
                    </tr>
                    @foreach($presensi as $p)
                    <tr>
                        <td class="text-center"> {{ $p-> semester }} </td>
                        <td class="text-center"> {{ $p->matpel -> kode }} </td>
                        <td> {{ $p->matpel -> nama }} </td>
                        <td class="text-center"> {{ $p->pengajar -> kode_pengajar }} </td>
                        <td> {{ $p->pengajar -> nama }} </td>
                        <td class="text-center"> {{ $p -> pertemuan_ke }} </td>
                        <td class="text-center" width="100px"> {{ $p -> tanggal }} </td>
                        <td class="text-center"> {{ $p -> kehadiran }} </td>
                        <td> {{ $p -> pembadal }} </td>
                        <td> {{ $p -> materi }} </td>
                        <td> {{ $p -> keterangan }} </td>
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
    <br>
    <br>
    <br>
    <center>{{$presensi->links()}}</center>
        </div>
    </div>
    </div>
</div>
@stop