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
<h5 class="page-title"><i class="fa fa-graduation-cap"></i> Daftar Rencana Studi</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading"></div>
            <div class="panel-body">
            <div class="row">
            "Belum ada mata pelajaran yang diambil!"
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection