<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Login | SIASQI</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
    <link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/bootstrap/css/bootstrap.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('admin/assets/vendor/linearicons/style.css')}}">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="{{asset('admin/assets/css/main.css')}}">
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
    <link rel="apple-touch-icon" sizes="76x76" href="{{asset('admin/assets/img/apple-icon.png')}}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{asset('admin/assets/img/logo.png')}}">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box ">
					<div class="left">
						<div class="content">
							<div class="header">
								<div class="logo text-center"><img src="{{asset('admin/assets/img/login-logo.png')}}" width="220" height="80" alt=""></div>
								<p class="lead">Login</p>
							</div>
							<form class="form-auth-small" action="postlogin" method="POST">
                                @csrf
                                
								<div class="form-group">
									<label for="signin-username" class="control-label sr-only">Username</label>
									<input type="text" name="username" class="form-control" id="signin-username" placeholder="Username">
								</div>
								<div class="form-group">
									<label for="signin-password" class="control-label sr-only">Password</label>
									<input type="password" name="password" class="form-control" id="signin-password" placeholder="Password">
								</div>								
								@if(session('error'))
									<p class="text-left text-danger">{{session('error')}}</p>
								@endif
								<button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
							</form>
							<br>
							<p>Belum punya akun? silakan <a href="/registrasi">Daftar</a></p>
						</div>
					</div>
					<div class="right">
						<div class="overlay"></div>
						<div class="content text">
							<h1 class="heading">Sistem Informasi Akademik SQI</h1>
							<p>LSO Quran Institute UNJ</p>
						</div>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>