@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-user"></i> Data Peserta</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Peserta</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/peserta/{{$peserta->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <label for="nis" class="col-md-3 col-form-label text-right"><strong>NIS :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="nis" value="{{$peserta->nis}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="nama" class="col-md-3 col-form-label text-right"><strong>Nama :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="nama" value="{{$peserta->nama}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="prodi" class="col-md-3 col-form-label text-right"><strong>Prodi :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="prodi" value="{{$peserta->prodi}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="fakultas" class="col-md-3 col-form-label text-right"><strong>Fakultas :</strong></label>
                            <div class="col-md-9">
                                <select id="fakultas" class="form-control form-control-sm" name="fakultas" required>
                                    <option value="FIP" @if($peserta->fakultas == 'FIP') selected @endif>FIP</option>
                                    <option value="FT" @if($peserta->fakultas == 'FT') selected @endif>FT</option>
                                    <option value="FMIPA" @if($peserta->fakultas == 'FMIPA') selected @endif>FMIPA</option>
                                    <option value="FE" @if($peserta->fakultas == 'FE') selected @endif>FE</option>
                                    <option value="FBS" @if($peserta->fakultas == 'FBS') selected @endif>FBS</option>
                                    <option value="FIS" @if($peserta->fakultas == 'FIS') selected @endif>FIS</option>
                                    <option value="FIK" @if($peserta->fakultas == 'FIK') selected @endif>FIK</option>
                                    <option value="FPPsi" @if($peserta->fakultas == 'FPPsi') selected @endif>FPPsi</option>
                                    <option value="Umum" @if($peserta->fakultas == 'Umum') selected @endif>Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="instansi" class="col-md-3 col-form-label text-right"><strong>Instansi :</strong></label>
                            <div class="col-md-9">
                                <select id="instansi" class="form-control form-control-sm" name="instansi" required>
                                    <option value="UNJ" @if($peserta->Instansi == 'UNJ') selected @endif>UNJ</option>
                                    <option value="Umum" @if($peserta->Instansi == 'Umum') selected @endif>Umum</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="angkatan" class="col-md-3 col-form-label text-right"><strong>Angkatan :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="angkatan" value="{{$peserta->angkatan}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="no_hp" class="col-md-3 col-form-label text-right"><strong>No Hp :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="no_hp" value="{{$peserta->no_hp}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="jenis_kelamin" class="col-md-3 col-form-label text-right"><strong>Jenis Kelamin :</strong></label>
                            <div class="col-md-9">
                                <select id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin" required>
                                    <option selected>Pilih</option>
                                    <option value="Laki-laki" @if($peserta->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                                    <option value="Perempuan" @if($peserta->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="level" class="col-md-3 col-form-label text-right"><strong>Level :</strong></label>
                            <div class="col-md-9">
                                <select id="level" class="form-control form-control-sm" name="level" required>
                                    <option value="1" @if($peserta->level == '1') selected @endif>Pra Tahsin 1</option>
                                    <option value="2" @if($peserta->level == '2') selected @endif>Pra Tahsin 2</option>
                                    <option value="3" @if($peserta->level == '3') selected @endif>Tahsin 1</option>
                                    <option value="4" @if($peserta->level == '4') selected @endif>Tahsin 2</option>
                                    <option value="5" @if($peserta->level == '5') selected @endif>Tahsin 3</option>
                                    <option value="6" @if($peserta->level == '6') selected @endif>Tahsin 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="semester_masuk" class="col-md-3 col-form-label text-right"><strong>Semester Masuk :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="semester_masuk" value="{{$peserta->semester_masuk}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <div class="row">
                            <label for="status" class="col-md-3 col-form-label text-right"><strong>Status :</strong></label>
                            <div class="col-md-9">
                                <select id="status" class="form-control form-control-sm" name="status" required>
                                    <option value="Aktif" @if($peserta->status == 'Aktif') selected @endif>Aktif</option>
                                    <option value="Non Aktif" @if($peserta->status == 'Non Aktif') selected @endif>Non Aktif</option>
                                    <option value="Lulus" @if($peserta->status == 'Lulus') selected @endif>Lulus</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="userid" class="col-md-3 col-form-label text-right"><strong>User Id :</strong></label>
                            <div class="col-md-9">
                            <input type="text" name="userid" value="{{$peserta->user_id}}" class="form-control form-control-sm" placeholder="">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-9">
                            <a href="/peserta" class="btn btn-secondary btn-sm">Batal</a>
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