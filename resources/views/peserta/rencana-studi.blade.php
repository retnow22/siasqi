@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-book"></i> Rencana Studi</h5>
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
                    <dd class="col-sm-8">{{auth()->user()->peserta->nis}}</dd>
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
        <h3 class="text-primary">Pilih Mata Pelajaran</h3>
        <br>
        <div class="row"> 
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
                    <th>Pengajar</th>
                    <th>Kuota</th>
                    <th>Aksi</th>
                </thead>
                </tr>
                @foreach($matpel as $matpel)
                <tr>
                    <td class="text-center"> {{ $matpel -> kode }} </td>
                    <td> {{ $matpel -> nama }} </td>
                    <td class="text-center"> {{ $matpel -> semester }} </td>
                    <td class="text-center"> {{ $matpel-> hari }} </td>
                    <td class="text-center"> {{ $matpel-> waktu }} </td>
                    <td class="text-center"> {{ $matpel-> level }} </td>
                    <td class="text-center"> {{ $matpel->pengajar->nama }} </td>
                    <td class="text-center"> {{ $matpel-> kuota }} </td>
                    <td class="text-center">
                    <a href="/peserta/{{$matpel->id}}/pilihmatpel" class="btn btn-primary btn-xs" onclick="return confirm('Pilih mata pelajaran ini')">Pilih</a>                         
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
    </div>
</div>
@endsection