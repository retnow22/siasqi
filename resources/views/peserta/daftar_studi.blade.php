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
        <h3 class="text-primary">Daftar Rencana Studi</h3>
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
                    <th>Grup Kelas</th>
                    <th>Aksi</th>                    
                </thead>
                </tr>
                @foreach($peserta->matpel as $peserta)
                <tr>
                    <td class="text-center"> {{ $peserta -> kode }} </td>
                    <td> {{ $peserta -> nama }} </td>
                    <td class="text-center"> {{ $peserta -> semester }} </td>
                    <td class="text-center"> {{ $peserta -> hari }} </td>
                    <td class="text-center"> {{ $peserta -> waktu }} </td>
                    <td class="text-center"> {{ $peserta -> level }} </td>
                    <td class="text-center"> {{ $peserta->pengajar-> nama }} </td>
                    <td class="text-center"><a href="{{ $peserta -> grup }}"> {{ $peserta -> grup }} </a></td>
                    <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#inputEval">Evaluasi</button>
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
<div class="modal fade" id="inputEval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Evaluasi Kegiatan KBM</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/peserta/{{$peserta->pivot->id}}/inputeval" method="POST" >
            @csrf            
            <div class="row">
                <label for="evaluasi" class="col-md-3 col-form-label text-right"><strong>Evaluasi :</strong></label>
                <div class="col-md-9">
                <textarea class="form-control form-control-sm" name="evaluasi" placeholder="" rows="5"></textarea>
                </div>
            </div>             
        
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">kirim</button>
    </div>
    </form>
    </div>
</div>
</div>

@endsection