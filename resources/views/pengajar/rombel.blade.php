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
<h5 class="page-title">
@php $role = auth()->user()->role @endphp

@if($role == 'Admin')
<i class="fa fa-group"></i><a href="/jadwal"> Data Mata Pelajaran</a> / Data Rombel</h5>
@elseif( $role == 'Pengajar')
<i class="fa fa-group"></i><a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal"> Jadwal Mengajar</a> / Data Rombel</h5> 
@endif

<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Data Rombel</h3>
            <div class="right">
            @if($role == 'Admin')
            <a href="/jadwal" class="btn btn-default btn-xs">Tutup</a>
            @elseif( $role == 'Pengajar')
            <a href="/pengajar/{{auth()->user()->pengajar->id}}/jadwal" class="btn btn-default btn-xs">Tutup</a>
            @endif
            </div>
        </div>
        <div class="panel-body">
            <div class="row"> 
            <p>
                <dl class="row">
                    <div class="col-md-6">
                    <div class="row">
                    @if($role == 'Admin')
                        <dt class="col-sm-4 text-right">Semester :</dt>
                        <dd class="col-sm-8">{{$rombel->semester}}</dd>
                        <dt class="col-sm-4 text-right">Level :</dt>
                        <dd class="col-sm-8">{{$rombel->level}}</dd>
                        <dt class="col-sm-4 text-right">Mata Pelajaran :</dt>
                        <dd class="col-sm-8"> ({{$rombel->kode}}) - {{$rombel->nama}}</dd>
                        <dt class="col-sm-4 text-right">Pengajar :</dt>
                        <dd class="col-sm-8"> ({{$rombel->pengajar->kode_pengajar}}) - {{$rombel->pengajar->nama}} </dd>
                        <dt class="col-sm-4 text-right">Hari :</dt>
                        <dd class="col-sm-8">{{$rombel->hari}}</dd>
                        <dt class="col-sm-4 text-right">Waktu :</dt>
                        <dd class="col-sm-8">{{$rombel->waktu}}</dd>
                        <dt class="col-sm-4 text-right">Grup Kelas :</dt>
                        <dd class="col-sm-8"><a href="{{$rombel->grup}}">{{$rombel->grup}}</a></dd>
                    @elseif( $role == 'Pengajar')
                        <dt class="col-sm-4 text-right">Semester :</dt>
                        <dd class="col-sm-8">{{$rombel->semester}}</dd>
                        <dt class="col-sm-4 text-right">Level :</dt>
                        <dd class="col-sm-8">{{$rombel->level}}</dd>
                        <dt class="col-sm-4 text-right">Mata Pelajaran :</dt>
                        <dd class="col-sm-8"> ({{$rombel->kode}}) - {{$rombel->nama}}</dd>
                        <dt class="col-sm-4 text-right">Hari :</dt>
                        <dd class="col-sm-8">{{$rombel->hari}}</dd>
                        <dt class="col-sm-4 text-right">Waktu :</dt>
                        <dd class="col-sm-8">{{$rombel->waktu}}</dd>
                        <dt class="col-sm-4 text-right">Grup Kelas :</dt>
                        <dd class="col-sm-8"><a href="{{$rombel->grup}}">{{$rombel->grup}}</a></dd>
                    @endif
                    </div>
                    </div>
                </dl>
            </p>
            <div class="row">
                <div class="col-md-3">
                    @if($role == 'Admin')                    
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#addNilai">
                    <i class="fa fa-plus"></i> Tambah Peserta
                    </button>
                    @elseif($role == 'Pengajar')   
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#inputEval">
                     Evaluasi
                    </button> 
                    @endif      
                </div>
                <div class="col-md-9">
                </div>
            </div>
            <br>
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                        <thead>
                        @if($role == 'Admin')
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Prodi/Angkatan</th>
                            <th>Nomor Hp</th>
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
                            <th>Aksi</th>
                        @elseif( $role == 'Pengajar')
                            <th>No</th>
                            <th>NIS</th>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Fakultas</th>
                            <th>Instansi</th>
                            <th>Angkatan</th>
                            <th>Nomor HP</th>
                            <th>Nilai Lisan</th>
                            <th>Nilai Teori</th>
                            <th>Nilai Akhir</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        @endif
                        </thead>
                    </tr>
                    @foreach($rombel->peserta as $key => $peserta)
                    <tr>
                    @if($role == 'Admin')
                        <td scope="row"> {{ $key + 1 }}</td>
                        <td class="text-center"> {{ $peserta -> nomor_induk }} </td>
                        <td> {{ $peserta -> nama }} </td>
                        <td class="text-center"> {{ $peserta -> prodi }}/ {{ $peserta -> angkatan }} </td>
                        <td class="text-center"> {{ $peserta -> no_hp }} </td>
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
                        <td>
                        <a href="/nilai/{{$peserta->pivot->id}}/deletepeserta" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
                        </td>
                    @elseif( $role == 'Pengajar')
                        <td scope="row"> {{ $key + 1 }}</td>
                        <td class="text-center"> {{ $peserta -> nomor_induk }} </td>
                        <td> {{ $peserta -> nama }} </td>
                        <td class="text-center"> {{ $peserta -> prodi }} </td>
                        <td class="text-center"> {{ $peserta -> fakultas }} </td>
                        <td class="text-center"> {{ $peserta -> instansi }} </td>
                        <td class="text-center"> {{ $peserta -> angkatan }} </td>
                        <td class="text-center"> {{ $peserta -> no_hp }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_lisan }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_teori }} </td>
                        <td class="text-center"> {{ $peserta->pivot->nilai_akhir }} </td>
                        <td class="text-center"> {{ $peserta->pivot->keterangan }} </td>
                        <td> 
                        <a href="/pengajar/{{$peserta->pivot->id}}/inputnilai" class="btn btn-primary btn-xs">Input Nilai</a>                       
                        </td>
                    @endif
                    </tr>
                    @endforeach
                </table>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="addNilai" tabindex="-1" role="dialog" aria-labelledby="addNilaiLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="addNilaiLabel">Tambah Peserta</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/nilai/addpeserta" method="POST" >
            @csrf 
            <div class="row">
                <label for="matpel_id" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                    <div class="col-md-9">
                        <select id="matpel_id" class="form-control form-control-sm" name="matpel_id" required readonly>
                            <option value="{{$rombel->id}}">({{$rombel->kode}})-{{$rombel->nama}}</option>
                        </select>
                    </div>
                </div>         
            <div class="row">
            <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama Peserta :</strong></label>
                <div class="col-md-9">
                    <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required>
                    @foreach($data_peserta as $peserta)
                        <option value="{{$peserta->id}}">(
                            @php $level=$peserta->level @endphp
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
                                    @endif)-({{$peserta->nomor_induk}})-{{$peserta->nama}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
    </div>
    </form>
    </div>
</div>
</div>


 <!-- Modal -->
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
        <form action="/pengajar/{{$rombel->id}}/inputeval" method="POST" >
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
        <button type="submit" class="btn btn-sm btn-warning">Kirim</button>
    </div>
    </form>
    </div>
</div>
</div>




@stop