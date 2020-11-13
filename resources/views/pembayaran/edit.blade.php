@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-money"></i> Data Pembayaran Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Pembayaran Peserta</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/pembayaran/{{$pembayaran->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                        <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama :</strong></label>
                            <div class="col-md-9">
                                <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required readonly>
                                    <option value="{{$pembayaran->peserta_id}}">({{$pembayaran->peserta->nomor_induk}})-{{$pembayaran->peserta->nama}}- {{$pembayaran->peserta->prodi}}/{{$pembayaran->peserta->angkatan}}</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                        <label for="semester" class="col-md-3 col-form-label text-right"><strong>Semester :</strong></label>
                        <div class="col-md-9">
                            <input type="text" name="semester" value="{{$pembayaran->semester}}"  class="form-control form-control-sm" placeholder="">
                        </div>
                        </div>
                        <div class="row">
                            <label for="nominal" class="col-md-3 col-form-label text-right"><strong>Nominal :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="nominal" value="{{$pembayaran->nominal}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="tgl_pembayaran" class="col-md-3 col-form-label text-right"><strong>Tgl Pembayaran :</strong></label>
                            <div class="col-md-9">
                            <input data-date-format="yyyy-mm-dd" id="datepicker" name="tgl_pembayaran" value="{{$pembayaran->tgl_pembayaran}}"class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                            <div class="col-md-9">
                                <select id="keterangan" class="form-control form-control-sm" name="keterangan" required>
                                    <option value="Lunas" @if($pembayaran->keterangan == 'Lunas') selected @endif>Lunas</option>
                                    <option value="Belum Lunas" @if($pembayaran->keterangan == 'Belum Lunas') selected @endif>Belum Lunas</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                            <a href="/pembayaran" class="btn btn-secondary btn-sm">Batal</a>
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