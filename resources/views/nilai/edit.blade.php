@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-graduation-ca"></i> Edit Nilai Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Nilai Peserta</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/nilai/{{$nilai->id}}/update" method="POST" >
                @csrf
                <div class="row">
                <label for="peserta_id" class="col-md-3 col-form-label text-right"><strong>Nama Peserta :</strong></label>
                    <div class="col-md-9">
                        <select id="peserta_id" class="form-control form-control-sm" name="peserta_id" required readonly>
                            <option value="{{$nilai->peserta_id}}">({{$nilai->peserta->nis}})-{{$nilai->peserta->nama}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                <label for="matpel_id" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                    <div class="col-md-9">
                        <select id="matpel_id" class="form-control form-control-sm" name="matpel_id" required readonly>
                            <option value="{{$nilai->matpel_id}}">({{$nilai->matpel->kode}})-{{$nilai->matpel->nama}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="nilai_lisan" class="col-md-3 col-form-label text-right"><strong>Nilai Lisan :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="nilai_lisan" value="{{$nilai->nilai_lisan}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="nilai_teori" class="col-md-3 col-form-label text-right"><strong>Nilai Teori :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="nilai_teori" value="{{$nilai->nilai_teori}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="nilai_akhir" class="col-md-3 col-form-label text-right"><strong>Nilai Akhir :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="nilai_akhir" value="{{$nilai->nilai_akhir}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="kkm" class="col-md-3 col-form-label text-right"><strong>KKM :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="kkm" value="{{$nilai->kkm}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="keterangan" class="col-md-3 col-form-label text-right"><strong>Keterangan :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="keterangan" value="{{$nilai->keterangan}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="penguji" class="col-md-3 col-form-label text-right"><strong>Penguji :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="penguji" value="{{$nilai->penguji}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/nilai" class="btn btn-secondary btn-sm">Batal</a>
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