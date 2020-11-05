@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-graduation-cap"></i> Hasil Studi</h5>
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
        <h3 class="text-primary">Daftar Hasil Studi</h3>
        <br>
        <div class="row"> 
            <div class= "table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                <thead>
                    <th>Kode MP</th>
                    <th>Semester</th>
                    <th>Mata Pelajaran</th>
                    <th>Penguji</th>
                    <th>Nilai Lisan</th>
                    <th>Nilai Teori</th>
                    <th>Nilai Akhir</th>
                    <th>KKM</th>
                    <th>Keterangan</th>
                    <th>Cetak Nilai</th>
                </thead>
                </tr>
                @foreach($nilai_peserta->matpel as $peserta)
                <tr>
                    <td class="text-center"> {{ $peserta -> kode }} </td>
                    <td class="text-center"> {{ $peserta -> semester }} </td>
                    <td> {{ $peserta -> nama }} </td>
                    <td> {{ $peserta->pivot -> penguji }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> nilai_lisan }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> nilai_teori }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> nilai_akhir }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> kkm }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> keterangan }} </td>
                    <td class="text-center">
                    <a href="#" class="btn btn-danger btn-xs" onclick="return confirm('Cetak nilai')"><i class="ace-icon fa fa-print"></i></a>                         
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