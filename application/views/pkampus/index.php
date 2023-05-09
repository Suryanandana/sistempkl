<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Dashboard Pembimbing Kampus</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/resource/css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('/resource/vendors/iconly/bold.css'); ?>">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('/node_modules/bootstrap-icons/font/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/resource/css/app.css'); ?>">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <?php var_dump($this->session->userdata('status')); ?>
    <div id="app">
        <div id="sidebar" class="active position-relative">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html">Sistem PKL Pembimbing Kampus</a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-item active ">
                            <a href="index.html" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
                <!-- Logout Menu -->
                <div class="log-out sidebar-menu position-absolute" style="bottom: 0;">
                    <ul class="menu">
                        <li class="sidebar-item">
                            <a href="javascript:void(0)" onclick="logout();" class='sidebar-link'>
                                <i class="bi bi-box-arrow-right" style="color: #ff7976;"></i>
                                <span style="color: #ff7976;">Log Out</span>
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
        </div>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Profile Statistics</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Selamat Datang <?= $this->session->userdata('username') ?></h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-profile-visit"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="<?= base_url('/resource/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('/resource/js/bootstrap.min.js'); ?>"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('/resource/js/pages/dashboard.js'); ?>"></script>

    <script src="<?= base_url('/resource/js/main.js'); ?>"></script>

    <!-- Log out konfirmation script -->
    <script>
        function logout(){
            if (confirm("Apakah yakin melakukan logout?")){
                window.open("<?php echo base_url(); ?>clogin/logout","_self");	
                    
            }	
        }
    </script>
</body>

</html>