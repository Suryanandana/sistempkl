<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login - Mazer Admin Dashboard</title>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('/resource/css/bootstrap.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('/node_modules/bootstrap-icons/font/bootstrap-icons.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('/resource/css/app.css'); ?>">
	<link rel="stylesheet" href="<?= base_url('/resource/css/pages/auth.css') ?>">
</head>

<body>
	<div id="auth">

		<div class="row h-100" style="overflow-x: hidden;">
			<div class="col-lg-5 col-12 order-1">
				<div id="auth-left">
					<h1 class="auth-title text-center">Login</h1>

					<form name="formlogin" id="formlogin" method="post" action="<?php echo base_url('clogin/proseslogin'); ?>" class="mt-4">
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="text" class="form-control form-control-xl" placeholder="Username" id="Username" name="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="password" class="form-control form-control-xl" placeholder="Password" id="Password" name="Password">
							<div class="form-control-icon">
								<i class="bi bi-shield-lock"></i>
							</div>
						</div>
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" onclick="proseslogin()" >Login</button>
					</form>
					<div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Tidak memiliki akun?<br><a href="<?= base_url('/register') ?>"
								class="font-bold">Daftar akun</a></p>
						<p><a class="font-bold" href="auth-forgot-password.html">Lupa password?</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">

				</div>
			</div>
		</div>
	</div>
</body>

</html>
