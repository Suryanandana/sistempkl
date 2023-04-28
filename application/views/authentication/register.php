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

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Daftar PKL</h1>
                    <form name="formdaftar" id="formdaftar" method="post" action="<?php echo base_url('cpendaftaran/insert_data'); ?>">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="nim" id="nim" placeholder="NIM">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="nama_lengkap" id="nama_lengkap" placeholder="Nama Lengkap">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="email" id="email" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5" onclick="insert_data()" >Daftar</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah punya akun? <a href="<?= base_url('/login') ?>"
                                class="font-bold">Login</a>.</p>
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