@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-money"></i> Status Pembayaran</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-12">
        <p>
            <dl class="row">
                <div class="col-md-6">
                <div class="row">
                    <dt class="col-sm-4 text-right">Nomor Induk :</dt>
                    <dd class="col-sm-8">{{auth()->user()->peserta->nomor_induk}}</dd>
                    <dt class="col-sm-4 text-right">Nama :</dt>
                    <dd class="col-sm-8">{{ Auth::user()->name }} </dd>
                    <dt class="col-sm-4 text-right">Level :</dt>
                    <dd class="col-sm-8">
                        @php $level = auth()->user()->peserta->level @endphp
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
                    <dt class="col-sm-4 text-right">Semester Masuk :</dt>
                    <dd class="col-sm-8">{{auth()->user()->peserta->semester_masuk}}</dd>
                </div>
                </div>
            </dl>
        </p>
        <br>
        <h3 class="text-primary">Status Pembayaran</h3>
        <br>
        <div class="row"> 
            <div class= "table-responsive">
            <table class="table table-hover table-striped">
                <tr>
                <thead>
                    <th>Semester</th>
                    <th>Nominal</th>
                    <th>Tanggal Pembayaran</th>
                    <th>Keterangan</th>
                </thead>
                </tr>
                @foreach($pembayaran_peserta->pembayaran as $peserta)
                <tr>
                    <td> {{ $peserta -> semester }} </td>
                    <td> {{ $peserta -> nominal }} </td>
                    <td> {{ $peserta -> tgl_pembayaran }} </td>
                    <td> {{ $peserta-> keterangan }} </td>
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
@endsection