@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-edit"></i> Laporan Kegiatan Belajar Mengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Laporan Kegiatan Belajar Mengajar</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/presensi/{{$presensi->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                    <div class="row">
                    <label for="matpel_id" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                        <div class="col-md-9">
                            <select id="matpel_id" class="form-control form-control-sm" name="matpel_id" required readonly>
                                <option value="{{$presensi->matpel_id}}">({{$presensi->matpel->semester}})-({{$presensi->matpel->kode}})-{{$presensi->matpel->nama}}</option>
                            </select>
                        </div>
                    </div>   
                    <div class="row">
                    <label for="pertemuan_ke" class="col-md-3 col-form-label text-right"><strong>Pertemuan Ke :</strong></label>
                        <div class="col-md-9">
                            <select id="pertemuan_ke" class="form-control form-control-sm" name="pertemuan_ke" required>
                                <option selected>Pilih</option>
                                <option value="1" @if($presensi->pertemuan_ke == '1') selected @endif>Pertemuan 1</option>
                                <option value="2" @if($presensi->pertemuan_ke == '2') selected @endif>Pertemuan 2</option>
                                <option value="3" @if($presensi->pertemuan_ke == '3') selected @endif>Pertemuan 3</option>
                                <option value="4" @if($presensi->pertemuan_ke == '4') selected @endif>Pertemuan 4</option>
                                <option value="5" @if($presensi->pertemuan_ke == '5') selected @endif>Pertemuan 5</option>
                                <option value="6" @if($presensi->pertemuan_ke == '6') selected @endif>Pertemuan 6</option>
                                <option value="7" @if($presensi->pertemuan_ke == '7') selected @endif>Pertemuan 7</option>
                                <option value="8" @if($presensi->pertemuan_ke == '8') selected @endif>Pertemuan 8</option>
                                <option value="9" @if($presensi->pertemuan_ke == '9') selected @endif>Pertemuan 9</option>
                                <option value="10" @if($presensi->pertemuan_ke == '10') selected @endif>Pertemuan 10</option>
                                <option value="11" @if($presensi->pertemuan_ke == '11') selected @endif>Pertemuan 11</option>
                                <option value="12" @if($presensi->pertemuan_ke == '12') selected @endif>Pertemuan 12</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <label for="tanggal" class="col-md-3 col-form-label text-right"><strong>Tanggal :</strong></label>
                        <div class="col-md-9">
                        <input data-date-format="yyyy-mm-dd" id="datepicker" name="tanggal" value="{{$presensi->tanggal}}" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="kehadiran" class="col-md-3 col-form-label text-right"><strong>Kehadiran :</strong></label>
                        <div class="col-md-9">
                            <select id="kehadiran" class="form-control form-control-sm" name="kehadiran" placeholder="{{$presensi->pembadal}}" required>
                                <option value="Hadir" @if($presensi->kehadiran == 'Hadir') selected @endif>Hadir</option>
                                <option value="Tidak Hadir" @if($presensi->kehadiran == 'Tidak Hadir') selected @endif>Tidak Hadir</option>
                                <option value="Dibadalkan" @if($presensi->kehadiran == 'Dibadalkan') selected @endif>Dibadalkan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                    <label for="pembadal" class="col-md-3 col-form-label text-right"><strong>Pembadal :</strong></label>
                        <div class="col-md-9">
                            <select id="pembadal" class="form-control form-control-sm" name="pembadal" required>
                            @foreach($data_pengajar as $dp)
                                <option value="{{$dp->nama}}">({{$dp->nomor_induk}})-({{$dp->kode_pengajar}})-{{$dp->nama}}</option>
                            @endforeach
                            </select>
                        </div>
                    </div>  
                    <div class="row">
                        <label for="materi" class="col-md-3 col-form-label text-right"><strong>Materi :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="materi" value="{{$presensi->materi}}" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                    <div class="row">
                        <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                        <div class="col-md-9">
                        <input type="text" name="keterangan" value="{{$presensi->keterangan}}" class="form-control form-control-sm" placeholder="">
                        </div>
                    </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                            <a href="/presensi/{{$presensi->pengajar_id}}/input-laporan" class="btn btn-secondary btn-sm">Batal</a>
                            <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Data akan diperbaharui')">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        </div>
        </div>
        </div>
    </div>
</div>
@endsection