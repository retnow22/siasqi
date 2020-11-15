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
            <!-- <div class="row">
                <div class="col-md-3">
                <div class="row ">
                    <form class="form-inline my-2 my-lg-0" method="GET" action="/laporan-kbm">
                    <input class="form-control " name="cari" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success " type="submit"><i class="fa fa-search"></i></button>
                    </form>
                </div>
                </div>
                <div class="col-md-9"></div>
            </div> -->
            <br>
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
                        <td class="text-center"> {{ $p -> tanggal }} </td>
                        <td class="text-center"> {{ $p -> kehadiran }} </td>
                        <td> {{ $p -> materi }} </td>
                        <td> {{ $p -> keterangan }} </td>
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