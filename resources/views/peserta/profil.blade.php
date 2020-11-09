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
<h5 class="page-title"><i class="fa fa-user-circle-o"></i> Profil</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading"></div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-12">
        <p>
            <dl class="row">
                <div class="col-md-6">
                <div class="row">
                    <dt class="col-sm-4 text-right">Nomor Induk :</dt>
                    <dd class="col-sm-8">{{auth()->user()->peserta->nis}}</dd>
                    <dt class="col-sm-4 text-right">Nama :</dt>
                    <dd class="col-sm-8">{{ Auth::user()->name }} </dd>
                    <dt class="col-sm-4 text-right">Level :</dt>
                    <dd class="col-sm-8">
                        @php $level = auth()->user()->peserta->level @endphp
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
                    <dt class="col-sm-4 text-right">Semester Masuk :</dt>
                    <dd class="col-sm-8">{{auth()->user()->peserta->semester_masuk}}</dd>
                </div>
                </div>
            </dl>
        </p>
        <br>
        <h3 class="text-primary">Biodata Peserta</h3>
        <br>
        <div class="row"> 
        <form action="/peserta/{{$peserta->id}}/updateprofil" method="POST">
        @csrf
        <div class="row">
            <div class="col-md-12">
            <div class="row">
                <label for="nama_peserta" class="col-md-2 col-form-label text-right">Nama</label>
                <div class="col-md-10">
                <input type="text" name="nama" value="{{$peserta->nama}}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="instansi" class="col-md-2 col-form-label text-right">Instansi</label>
                <div class="col-md-10">
                    <select id="instansi" class="form-control form-control-sm" name="instansi" required>
                        <option value="UNJ" @if($peserta->instansi == 'UNJ') selected @endif>UNJ</option>
                        <option value="Umum" @if($peserta->instansi == 'Umum') selected @endif>Umum</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <label for="fakultas" class="col-md-2 col-form-label text-right">Fakultas</label>
                <div class="col-md-10">
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
                <label for="prodi" class="col-md-2 col-form-label text-right">Prodi</label>
                <div class="col-md-10">
                <input type="text" name="prodi" value="{{ $peserta->prodi }}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="angkatan" class="col-md-2 col-form-label text-right">Angkatan</label>
                <div class="col-md-10">
                <input type="text" name="angkatan" value="{{ $peserta->angkatan }}" class="form-control" placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="no_hp" class="col-md-2 col-form-label text-right">No Hp</label>
                <div class="col-md-10">
                <input type="text" name="no_hp" value="{{ $peserta->no_hp }}" class="form-control " placeholder="">
                </div>
            </div>
            <div class="row">
                <label for="jenis_kelamin" class="col-md-2 col-form-label text-right">Jenis Kelamin</label>
                <div class="col-md-10">
                    <select id="jenis_kelamin" class="form-control form-control-sm" name="jenis_kelamin" required>
                        <option value="Laki-laki" @if($peserta->jenis_kelamin == 'Laki-laki') selected @endif>Laki-laki</option>
                        <option value="Perempuan" @if($peserta->jenis_kelamin == 'Perempuan') selected @endif>Perempuan</option>
                    </select>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-10">
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
        </div>
    </div>
</div>
@endsection