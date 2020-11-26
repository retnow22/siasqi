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
                        Di Sistem Informasi Akademik Study Quran Intensive LSO Quran Institute UNJ
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bullhorn"></i>  Info Akademik SQI</h3>
                </div>
                <div class="panel-body">
                    <div class="row"> 
                        <div class= "table-responsive">
                        <table class="table table-condensed">
                            @foreach($informasi_sqi as $sqi)
                            <tr>
                                <td class="text-primary" width="250px"><strong>{{ $sqi -> label }}</strong></td>
                                <td> {{ $sqi -> deskripsi }} </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-bullhorn"></i>  Info Kegiatan QI UNJ</h3>
                </div>
                <div class="panel-body">
                    <div class="row"> 
                        <div class= "table-responsive">
                        <table class="table table-condensed">
                            @foreach($informasi_qi as $qi)
                            <tr>
                                <td class="text-primary" width="250px"><strong>{{ $qi -> label }}</strong></td>
                                <td> {{ $qi -> deskripsi }} </td>
                            </tr>
                            @endforeach
                        </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</div>
@endsection