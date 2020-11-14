@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-bullhorn"></i> Data Informasi Kegiatan QI</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Informasi Kegiatan QI</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/informasi/{{$informasi->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <label for="label" class="col-md-3 col-form-label text-right"><strong>Label :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="label" value="{{$informasi->label}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="deskripsi" class="col-md-3 col-form-label text-right"><strong>Deskripsi :</strong></label>
                    <div class="col-md-9">
                    <textarea class="form-control form-control-sm" name="deskripsi" placeholder="" rows="4">{{$informasi->deskripsi}}</textarea>
                    </div>
                </div>
                <div class="row">
                    <label for="pelaksana" class="col-md-3 col-form-label text-right"><strong>Pelaksana :</strong></label>
                    <div class="col-md-9">
                        <select id="pelaksana" class="form-control form-control-sm" name="pelaksana" required>
                            <option value="SQI" @if($informasi->pelaksana == 'SQI') selected @endif>SQI</option>
                            <option value="QI" @if($informasi->pelaksana == 'QI') selected @endif>QI</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/informasi" class="btn btn-secondary btn-sm">Batal</a>
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