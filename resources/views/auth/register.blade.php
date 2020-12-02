<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" type="image/png" href="{{asset('admin/assets/img/logo.png')}}">
        <title>SIASQI UNJ</title>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/modules/data.js"></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:700, 600,500,400,300' rel='stylesheet' type='text/css'>


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">

        <!-- Icon -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Date Picker -->
    </head>
    <body>
    <nav class="navbar navbar-container-md navbar-dark bg-primary">
            <div class="container-fluid">  
                    <a class="navbar-brand">
                        PENDAFTARAN SIASQI UNJ
                    </a>
                </div>
    </nav>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header"></div>

                        <div class="card-body">
                            <form method="POST" action="/postregistrasi">
                                @csrf

                                <div class="form-group row">
                                    <label for="nomor_induk" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Induk') }}</label>

                                    <div class="col-md-6">
                                        <input id="nomor_induk" type="text" class="form-control" name="nomor_induk" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                                    <div class="col-md-6">
                                        <input id="nama" type="text" class="form-control" name="nama" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="prodi" class="col-md-4 col-form-label text-md-right">{{ __('Prodi') }}</label>

                                    <div class="col-md-6">
                                        <input id="prodi" type="text" class="form-control" name="prodi" required >
                                    </div>
                                </div>
                            
                                <div class="form-group row">
                                    <label for="fakultas" class="col-md-4 col-form-label text-md-right">{{ __('Fakultas') }}</label>

                                    <div class="col-md-6">
                                        <select id="fakultas" class="custom-select" name="fakultas" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="FIP">FIP</option>
                                            <option value="FT">FT</option>
                                            <option value="FMIPA">FMIPA</option>
                                            <option value="FE">FE</option>
                                            <option value="FBS">FBS</option>
                                            <option value="FIS">FIS</option>
                                            <option value="FIK">FIK</option>
                                            <option value="FPPsi">FPPsi</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="instansi" class="col-md-4 col-form-label text-md-right">{{ __('Instansi') }}</label>

                                    <div class="col-md-6">
                                        <select id="instansi" class="custom-select" name="instansi" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="UNJ">UNJ</option>
                                            <option value="Umum">Umum</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="angkatan" class="col-md-4 col-form-label text-md-right">{{ __('Angkatan') }}</label>

                                    <div class="col-md-6">
                                        <input id="angkatan" type="text" class="form-control" name="angkatan" required >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('Nomor Hp') }}</label>

                                    <div class="col-md-6">
                                        <input id="no_hp" type="text" class="form-control" name="no_hp" required >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jenis_kelamin" class="col-md-4 col-form-label text-md-right">{{ __('Jenis Kelamin') }}</label>

                                    <div class="col-md-6">
                                        <select id="jenis_kelamin" class="custom-select" name="jenis_kelamin" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="level" class="col-md-4 col-form-label text-md-right">{{ __('Level') }}</label>

                                    <div class="col-md-6">
                                        <select id="level" class="custom-select" name="level" required>
                                            <option value="" selected>Pilih</option>
                                            <option value="1">Pra Tahsin 1</option>
                                            <option value="2">Pra Tahsin 2</option>
                                            <option value="3">Tahsin 1</option>
                                            <option value="4">Tahsin 2</option>
                                            <option value="5">Tahsin 3</option>
                                            <option value="6">Tahsin 4</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Daftar sebagai') }}</label>

                                    <div class="col-md-6">
                                        <select id="role" class="custom-select" name="role" required>
                                            <option selected>Pilih</option>
                                            <option value="Pengajar">Pengajar</option>
                                            <option value="Peserta">Peserta</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="semester_masuk" class="col-md-4 col-form-label text-md-right">{{ __('Semester Masuk') }}</label>

                                    <div class="col-md-6">
                                        <input id="semester_masuk" type="text" class="form-control" name="semester_masuk" required>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Daftar') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>