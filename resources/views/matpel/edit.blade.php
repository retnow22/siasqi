@extends('layouts.app')

@section('content')
<h5 class="page-title"><i class="fa fa-book"></i> Edit Data Mata Pelajaran</h5>
<div class="row">
    <div class="col-md-12">
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Edit Data Mata Pelajaran</h3>
        </div>
        <div class="panel-body">
        <div class="row">
        <div class="col-md-8">
            <form action="/jadwal/{{$matpel->id}}/update" method="POST" >
                @csrf
                <div class="row">
                    <label for="kode" class="col-md-3 col-form-label text-right"><strong>Kode :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="kode" value="{{$matpel->kode}}" class="form-control form-control-sm" placeholder="" readonly>
                    </div>
                </div>
                <div class="row">
                    <label for="nama" class="col-md-3 col-form-label text-right"><strong>Mata Pelajaran :</strong></label>
                    <div class="col-md-9">
                        <select id="nama" class="form-control form-control-sm" name="nama" required readonly>
                            <option value="{{$matpel->nama}}">{{$matpel->nama}}</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="semester" class="col-md-3 col-form-label text-right"><strong>Semester :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="semester" value="{{$matpel->semester}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                    <label for="hari" class="col-md-3 col-form-label text-right"><strong>Hari :</strong></label>
                    <div class="col-md-9">
                        <select id="hari" class="form-control form-control-sm" name="hari" required>
                            <option value="Senin" @if($matpel->hari == 'Senin') selected @endif>Senin</option>
                            <option value="Selasa" @if($matpel->hari == 'Selasa') selected @endif>Selasa</option>
                            <option value="Rabu" @if($matpel->hari == 'Rabu') selected @endif>Rabu</option>
                            <option value="Kamis" @if($matpel->hari == 'Kamis') selected @endif>Kamis</option>
                            <option value="Jumat" @if($matpel->hari == 'Jumat') selected @endif>Jumat</option>
                            <option value="Sabtu" @if($matpel->hari == 'Sabtu') selected @endif>Sabtu</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="waktu" class="col-md-3 col-form-label text-right"><strong>Waktu :</strong></label>
                    <div class="col-md-9">
                        <select id="waktu" class="form-control form-control-sm" name="waktu" required>
                            <option value="08.00-10.00" @if($matpel->waktu == '08.00-10.00') selected @endif>08.00-10.00</option>
                            <option value="10.00-12.00" @if($matpel->waktu == '10.00-12.00') selected @endif>10.00-12.00</option>                                
                            <option value="13.00-15.00" @if($matpel->waktu == '13.00-15.00') selected @endif>13.00-15.00</option>
                            <option value="16.00-18.00" @if($matpel->waktu == '16.00-18.00') selected @endif>16.00-18.00</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="level" class="col-md-3 col-form-label text-right"><strong>Level :</strong></label>
                    <div class="col-md-9">
                        <select id="level" class="form-control form-control-sm" name="level" required>
                            <option value="1" @if($matpel->level == '1') selected @endif>Pra Tahsin 1</option>
                            <option value="2" @if($matpel->level == '2') selected @endif>Pra Tahsin 2</option>
                            <option value="3" @if($matpel->level == '3') selected @endif>Tahsin 1</option>
                            <option value="4" @if($matpel->level == '4') selected @endif>Tahsin 2</option>
                            <option value="5" @if($matpel->level == '5') selected @endif>Tahsin 3</option>
                            <option value="6" @if($matpel->level == '6') selected @endif>Tahsin 4</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <label for="kuota" class="col-md-3 col-form-label text-right"><strong>Kuota :</strong></label>
                    <div class="col-md-9">
                    <input type="text" name="kuota" value="{{$matpel->kuota}}" class="form-control form-control-sm" placeholder="">
                    </div>
                </div>
                <div class="row">
                <label for="pengajar_id" class="col-md-3 col-form-label text-right"><strong>Nama Pengajar :</strong></label>
                    <div class="col-md-9">
                        <select id="pengajar_id" class="form-control form-control-sm" name="pengajar_id" required>
                            <option value="{{$matpel->pengajar_id}}">{{ $matpel->pengajar-> nama }}</option>
                        @foreach($data_pengajar as $pengajar)
                            <option value="{{$pengajar->id}}">(@php $level=$pengajar->level @endphp
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
                                @endif)-({{$pengajar->kode_pengajar}})-{{$pengajar->nama}}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-9">
                    <a href="/jadwal" class="btn btn-secondary btn-sm">Batal</a>
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