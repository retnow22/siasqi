@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-envelope"></i> Data Kafalah Pengajar</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Kafalah Pengajar</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/kafalah/{{$kafalah->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <label for="semester" class="col-md-3 col-form-label text-right"><strong>Semester :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="semester" value="{{$kafalah->semester}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                <label for="pengajar_id" class="col-md-3 col-form-label text-right"><strong>Nama Pengajar :</strong></label>
                    <div class="col-md-9">
                        <select id="pengajar_id" class="form-control form-control-sm" name="pengajar_id" required readonly>
                            <option value="{{$kafalah->pengajar_id}}">({{$kafalah->pengajar->nomor_induk}})-{{$kafalah->pengajar->nama}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="nominal" class="col-md-3 col-form-label text-right"><strong>Nominal :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="nominal" value="{{$kafalah->nominal}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="jumlah_mengajar" class="col-md-3 col-form-label text-right"><strong>Jumlah Mengajar :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="jumlah_mengajar" value="{{$kafalah->jumlah_mengajar}}" class="form-control form-control-sm" placeholder="" readonly>
                    </div>
                </div>
                <div class="row">
                    <label for="badal" class="col-md-3 col-form-label text-right"><strong>Jumlah Membadalkan :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="badal" value="{{$kafalah->badal}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/kafalah" class="btn btn-secondary btn-sm">Batal</a>
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