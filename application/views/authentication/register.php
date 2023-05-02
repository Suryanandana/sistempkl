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
    <!-- custom css -->
    <link rel="stylesheet" href="<?= base_url('/resource/css/style.css') ?>">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title" style="font-size:57px">Daftar PKL</h1>
                    <?php if ($this->session->has_userdata('regis_gagal')): ?>
                        <div class="alert alert-danger alert-dismissible fade show position-relative" role="alert">
                            <?= $this->session->userdata('regis_gagal'); ?>
                            <button type="button" class="btn-close position-absolute" style="top:50%; transform: translateY(-50%);" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
                    <?php if ($this->session->has_userdata('regis_berhasil')): ?>
                        <div class="alert alert-success alert-dismissible fade show position-relative" role="alert">
                            <?= $this->session->userdata('regis_berhasil'); ?>
                            <button type="button" class="btn-close position-absolute" style="top:50%; transform: translateY(-50%);" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
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
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-3" onclick="insert_data()" >Daftar</button>
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
    <script src="<?= base_url('resource/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= base_url('resource/js/main.js') ?>"></script>
</body>

</html>