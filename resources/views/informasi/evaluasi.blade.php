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
<h5 class="page-title"><i class="fa fa-archive"></i> Rekap Evaluasi Kegiatan SQI</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Rekap Evaluasi Kegiatan SQI</h3>
        </div>
        <div class="panel-body">
            <div class="row">
            <div class="col-md-6">
                <div class= "table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <thead>
                            <th>Semester</th>
                            <th>Evaluasi Oleh Pengajar</th>
                        </thead>
                    </tr>
                    @foreach($evaluasi_pengajar as $epn)
                    <tr>
                        <td> {{ $epn -> semester }} </td>
                        <td> {{ $epn -> evaluasi }} </td>
                    </tr>
                    @endforeach
                </table>
                </div></div>
            <div class="col-md-6">
                <div class= "table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <thead>
                            <th>Semester</th>
                            <th>Evaluasi Oleh Peserta</th>
                        </thead>
                    </tr>
                    @foreach($evaluasi_peserta as $eps)
                    <tr>
                        <td> {{ $eps->matpel -> semester }} </td>
                        <td> {{ $eps -> evaluasi }} </td>
                    </tr>
                    @endforeach
                </table>
                </div></div>
            </div>
        </div>
    </div>
    </div>
</div>

@stop