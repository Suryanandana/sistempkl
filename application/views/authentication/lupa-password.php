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
					<h1 class="auth-title text-center" style="font-size: 60px">Lupa Password</h1>
					<form name="formlogin" id="formlogin" method="post" action="<?php echo base_url('cauthentication/prosesLupaPassword'); ?>" class="mt-4">
					<?php if ($this->session->has_userdata('reset_berhasil')): ?>
                        <div class="alert alert-success alert-dismissible fade show position-relative" role="alert">
                            <?= $this->session->userdata('reset_berhasil'); ?>
                            <button type="button" class="btn-close position-absolute" style="top:50%; transform: translateY(-50%);" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
					<?php if ($this->session->has_userdata('reset_gagal')): ?>
                        <div class="alert alert-danger alert-dismissible fade show position-relative" role="alert">
                            <?= $this->session->userdata('reset_gagal'); ?>
                            <button type="button" class="btn-close position-absolute" style="top:50%; transform: translateY(-50%);" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
						<div class="form-group position-relative has-icon-left mb-4">
							<input type="text" class="form-control form-control-xl" placeholder="Username" id="Username" name="Username">
							<div class="form-control-icon">
								<i class="bi bi-person"></i>
							</div>
						</div>
						<button class="btn btn-primary btn-block btn-lg shadow-lg mt-2" onclick="proseslogin()" >Kirim</button>
					</form>
					<div class="text-center mt-5 text-lg fs-4">
						<p class="text-gray-600">Tidak memiliki akun?<br><a href="<?= base_url('/register') ?>"
								class="font-bold">Daftar akun</a></p>
						<p><a class="font-bold" href="<?= base_url("/login") ?>">Login akun</a></p>
					</div>
				</div>
			</div>
			<div class="col-lg-7 d-none d-lg-block">
				<div id="auth-right">
				</div>
			</div>
		</div>
	</div>
	<script src="<?= base_url('resource/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('resource/js/main.js') ?>"></script>
</body>

</html>
