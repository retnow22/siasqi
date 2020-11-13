@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-calendar-check-o"></i> Presensi</h5>
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
        <h3 class="text-primary">Daftar Presensi</h3>
        <br>
        <div class="row"> 
            <div class= "table-responsive">
            <table class="table table-hover table-striped table-bordered">
                <tr>
                <thead>
                    <th>Kode MP</th>
                    <th>Semester</th>
                    <th>Mata Pelajaran</th>
                    <th>Pertemuan 1</th>
                    <th>Pertemuan 2</th>
                    <th>Pertemuan 3</th>
                    <th>Pertemuan 4</th>
                    <th>Pertemuan 5</th>
                    <th>Pertemuan 6</th>
                    <th>Pertemuan 7</th>
                    <th>Pertemuan 8</th>
                    <th>Pertemuan 9</th>
                    <th>Pertemuan 10</th>
                    <th>Pertemuan 11</th>
                    <th>Pertemuan 12</th>  
                </thead>
                </tr>
                @foreach($presensi->matpel as $peserta)
                <tr>
                    <td class="text-center"> {{ $peserta -> kode }} </td>
                    <td class="text-center"> {{ $peserta -> semester }} </td>
                    <td> {{ $peserta -> nama }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan1 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan2 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan3 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan4 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan5 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan6 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan7 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan8 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan9 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan10 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan11 }} </td>
                    <td class="text-center"> {{ $peserta->pivot -> pertemuan12 }} </td>
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