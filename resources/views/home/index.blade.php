@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-home"></i> Beranda</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title"></h3>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="alert alert-info" role="alert">               
                    @if (session('status'))
                        <div class="alert alert-info" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    {{ __('') }}
                        Selamat Datang {{ Auth::user()->name }}
                        <br>
                        Di Sistem Informasi Akademik Study Quran Intensive Quran Institute UNJ (BETA)
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection