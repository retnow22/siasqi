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
<h5 class="page-title"><i class="fa fa-edit"></i> Laporan Kegiatan Belajar Mengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
        </div>
        <div class="panel-body">
            <div class="row">
            <p>
                <dl class="row">
                    <div class="col-md-6">
                    <div class="row">
                        <dt class="col-sm-4 text-right">Nomor Induk :</dt>
                        <dd class="col-sm-8">{{auth()->user()->pengajar->nomor_induk}}</dd>
                        <dt class="col-sm-4 text-right">Level :</dt>
                        <dd class="col-sm-8">
                            @php $level = auth()->user()->pengajar->level @endphp
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
                        <dt class="col-sm-4 text-right">Kode Pengajar :</dt>
                        <dd class="col-sm-8">{{auth()->user()->pengajar->kode_pengajar}}</dd>
                    </div>
                    </div>
                </dl>
            </p>
            <br>
                <h3 class="text-primary">Laporan Kegiatan Belajar Mengajar</h3>
            <br>
                <div class="col-md-2">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    <i class="fa fa-plus"></i> Buat Laporan
                    </button>
                </div>
                <div class="col-md-10"></div>
            </div>
            <br>
            <div class="row"> 
                <div class= "table-responsive">
                <table class="table table-hover table-striped table-bordered">
                    <tr>
                    <thead>
                        <th>Semester</th>
                        <th>Kode MP</th>
                        <th>Mata Pelajaran</th>
                        <th>Pertemuan ke</th>
                        <th>Tanggal</th>
                        <th>Kehadiran</th>
                        <th>Pembadal</th>
                        <th>Materi</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>

                    </thead>
                    </tr>
                    @foreach($pengajar->presensi as $pengajar)
                    <tr>
                        <td class="text-center"> {{ $pengajar-> semester }} </td>
                        <td class="text-center"> {{ $pengajar->matpel -> kode }} </td>
                        <td> {{ $pengajar->matpel -> nama }} </td>
                        <td class="text-center"> {{ $pengajar-> pertemuan_ke }} </td>
                        <td class="text-center"> {{ $pengajar-> tanggal }} </td>
                        <td class="text-center"> {{ $pengajar-> kehadiran }} </td>
                        <td> {{ $nama_pembadal }} </td>
                        <td> {{ $pengajar-> materi }} </td>
                        <td> {{ $pengajar-> keterangan }} </td>
                        <td> 
                        <a href="/presensi/{{$pengajar->id}}/edit" class="btn btn-warning btn-xs"><i class="lnr lnr-pencil"></i></a>
                        <a href="/presensi/{{$pengajar->id}}/delete" class="btn btn-danger btn-xs" onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')"><i class="lnr lnr-trash"></i></a>                         
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

 <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Laporan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <form action="/presensi/create" method="POST" >
            @csrf
            <div class="row">
                <div class="col-md-12">   
                    <div class="row">
                    <label for="matpel_id" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                        <div class="col-md-9">
                            <select id="matpel_id" class="form-control form-control-sm" name="matpel_id" required>
                            <option value="" selected>pilih</option>
                            @foreach($matpel as $mp)
                                <option value="{{$mp->id}}">({{$mp->semester}})-({{$mp->kode}})-{{$mp->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>   
                    <div class="row">
                    <label for="pertemuan_ke" class="col-md-3 col-form-label text-right"><strong>Pertemuan Ke :</strong></label>
                        <div class="col-md-9">
                            <select id="pertemuan_ke" class="form-control form-control-sm" name="pertemuan_ke" required>
                                <option selected>Pilih</option>
                                <option value="1">Pertemuan 1</option>
                                <option value="2">Pertemuan 2</option>
                                <option value="3">Pertemuan 3</option>
                                <option value="4">Pertemuan 4</option>
                                <option value="5">Pertemuan 5</option>
                                <option value="6">Pertemuan 6</option>
                                <option value="7">Pertemuan 7</option>
                                <option value="8">Pertemuan 8</option>
                                <option value="9">Pertemuan 9</option>
                                <option value="10">Pertemuan 10</option>
                                <option value="11">Pertemuan 11</option>
                                <option value="12">Pertemuan 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="tanggal" class="col-md-3 col-form-label text-right"><strong>Tanggal :</strong></label>
                        <div class="col-md-9">
                        <input data-date-format="yyyy-mm-dd" id="datepicker" name="tanggal" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="kehadiran" class="col-md-3 col-form-label text-right"><strong>Kehadiran :</strong></label>
                        <div class="col-md-9">
                            <select id="kehadiran" class="form-control form-control-sm" name="kehadiran" required>
                                <option selected>Pilih</option>
                                <option value="Hadir">Hadir</option>
                                <option value="Tidak Hadir">Tidak Hadir</option>
                                <option value="Dibadalkan">Dibadalkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <label for="pembadal_id" class="col-md-3 col-form-label text-right"><strong>Pembadal :</strong></label>
                        <div class="col-md-9">
                            <select id="pembadal_id" class="form-control form-control-sm" name="pembadal_id" required>
                            <option value="" selected>pilih</option>
                            @foreach($data_pengajar as $dp)
                                <option value="{{$dp->id}}">({{$dp->nomor_induk}})-({{$dp->kode_pengajar}})-{{$dp->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>   
                    <div class="row">
                        <label for="materi" class="col-md-3 col-form-label text-right"><strong>Materi :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="materi" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="keterangan" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
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

@stop