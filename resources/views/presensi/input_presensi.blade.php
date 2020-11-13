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
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan2" class="col-md-3 col-form-label text-right"><strong>Pertemuan 2 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan2" class="form-control form-control-sm" name="pertemuan2">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan3" class="col-md-3 col-form-label text-right"><strong>Pertemuan 3 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan3" class="form-control form-control-sm" name="pertemuan3">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan4" class="col-md-3 col-form-label text-right"><strong>Pertemuan 4 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan4" class="form-control form-control-sm" name="pertemuan4">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan5" class="col-md-3 col-form-label text-right"><strong>Pertemuan 5 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan5" class="form-control form-control-sm" name="pertemuan5">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan6" class="col-md-3 col-form-label text-right"><strong>Pertemuan 6 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan6" class="form-control form-control-sm" name="pertemuan6">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan7" class="col-md-3 col-form-label text-right"><strong>Pertemuan 7 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan7" class="form-control form-control-sm" name="pertemuan7">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan8" class="col-md-3 col-form-label text-right"><strong>Pertemuan 8 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan8" class="form-control form-control-sm" name="pertemuan8">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan9" class="col-md-3 col-form-label text-right"><strong>Pertemuan 9 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan9" class="form-control form-control-sm" name="pertemuan9">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan10" class="col-md-3 col-form-label text-right"><strong>Pertemuan 10 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan10" class="form-control form-control-sm" name="pertemuan10">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan11" class="col-md-3 col-form-label text-right"><strong>Pertemuan 11 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan11" class="form-control form-control-sm" name="pertemuan11">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="pertemuan12" class="col-md-3 col-form-label text-right"><strong>Pertemuan 12 :</strong></label>
                    <div class="col-md-9">
                        <select id="pertemuan12" class="form-control form-control-sm" name="pertemuan12">
                            <option value="">Pilih</option>
                            <option value="H">Hadir</option>
                            <option value="I">Izin</option>
                            <option value="S">Sakit</option>
                            <option value="A">Alfa</option>
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