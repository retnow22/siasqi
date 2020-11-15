@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-group"></i> Input Presensi Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Input Presensi Peserta</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/pengajar/{{$nilai->id}}/updatepresensi" method="POST" >
                @csrf
                
                <div class="row">
                <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama Peserta :</strong></label>
                    <div class="col-md-9">
                        <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required readonly>
                            <option value="{{$nilai->peserta_id}}">({{$nilai->peserta->nomor_induk}})-{{$nilai->peserta->nama}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan1" class="col-md-3 col-form-label text-right"><strong>Pertemuan 1 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan1" class="form-control form-control-sm" name="pertemuan1">
                            <option value="" @if($nilai->pertemuan1 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan1 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan1 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan1 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan1 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan2" class="col-md-3 col-form-label text-right"><strong>Pertemuan 2 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan2" class="form-control form-control-sm" name="pertemuan2">
                            <option value="" @if($nilai->pertemuan2 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan2 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan2 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan2 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan2 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan3" class="col-md-3 col-form-label text-right"><strong>Pertemuan 3 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan3" class="form-control form-control-sm" name="pertemuan3">
                            <option value="" @if($nilai->pertemuan3 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan3 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan3 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan3 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan3 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan4" class="col-md-3 col-form-label text-right"><strong>Pertemuan 4 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan4" class="form-control form-control-sm" name="pertemuan4">
                            <option value="" @if($nilai->pertemuan4 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan4 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan4 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan4 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan4 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan5" class="col-md-3 col-form-label text-right"><strong>Pertemuan 5 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan5" class="form-control form-control-sm" name="pertemuan5">
                            <option value="" @if($nilai->pertemuan5 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan5 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan5 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan5 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan5 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan6" class="col-md-3 col-form-label text-right"><strong>Pertemuan 6 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan6" class="form-control form-control-sm" name="pertemuan6">
                            <option value="" @if($nilai->pertemuan6 == '') selected @endif @if($nilai->pertemuan6 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan6 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan6 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan6 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan6 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan7" class="col-md-3 col-form-label text-right"><strong>Pertemuan 7 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan7" class="form-control form-control-sm" name="pertemuan7">
                            <option value="" @if($nilai->pertemuan7 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan7 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan7 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan7 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan7 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan8" class="col-md-3 col-form-label text-right"><strong>Pertemuan 8 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan8" class="form-control form-control-sm" name="pertemuan8">
                            <option value="" @if($nilai->pertemuan8 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan8 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan8 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan8 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan8 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan9" class="col-md-3 col-form-label text-right"><strong>Pertemuan 9 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan9" class="form-control form-control-sm" name="pertemuan9">
                            <option value="" @if($nilai->pertemuan9 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan9 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan9 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan9 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan9 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan10" class="col-md-3 col-form-label text-right"><strong>Pertemuan 10 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan10" class="form-control form-control-sm" name="pertemuan10">
                            <option value="" @if($nilai->pertemuan10 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan10 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan10 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan10 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan10 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan11" class="col-md-3 col-form-label text-right"><strong>Pertemuan 11 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan11" class="form-control form-control-sm" name="pertemuan11">
                            <option value="" @if($nilai->pertemuan11 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan11 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan11 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan11 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan11 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan12" class="col-md-3 col-form-label text-right"><strong>Pertemuan 12 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan12" class="form-control form-control-sm" name="pertemuan12">
                            <option value="" @if($nilai->pertemuan12 == '') selected @endif>Pilih</option>
                            <option value="H" @if($nilai->pertemuan12 == 'H') selected @endif>Hadir</option>
                            <option value="I" @if($nilai->pertemuan12 == 'I') selected @endif>Izin</option>
                            <option value="S" @if($nilai->pertemuan12 == 'S') selected @endif>Sakit</option>
                            <option value="A" @if($nilai->pertemuan12 == 'A') selected @endif>Alfa</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/pengajar/{{$nilai->matpel_id}}/lihatpresensi" class="btn btn-secondary btn-sm">Batal</a>
                    <button type="submit" class="btn btn-sm btn-warning" onclick="return confirm('Data akan diperbaharui')">Simpan</button>
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