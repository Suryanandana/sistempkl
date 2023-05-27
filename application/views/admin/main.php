<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Admin Dashboard</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('/resource/css/bootstrap.css'); ?>">

    <link rel="stylesheet" href="<?= base_url('/resource/vendors/iconly/bold.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/resource/vendors/fontawesome/all.min.css') ?>">
    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= base_url('/node_modules/bootstrap-icons/font/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?= base_url('/resource/css/app.css'); ?>">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
</head>

<body>
    <div id="app">

        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            <?php if(isset($content)) {
                echo $content;
            } ?>
        </div>
    </div>
    <script src="<?= base_url('/resource/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?= base_url('/resource/js/bootstrap.min.js'); ?>"></script>

    <script src="assets/vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= base_url('/resource/js/pages/dashboard.js'); ?>"></script>
    <script src="<?= base_url('/resource/vendors/fontawesome/all.min.js') ?>"></script>
    <script src="<?= base_url('/resource/js/main.js'); ?>"></script>

    <!-- Log out konfirmation script -->
    <script>
    function logout() {
        if (confirm("Apakah yakin melakukan logout?")) {
            window.open("<?php echo base_url(); ?>clogin/logout", "_self");

        }
    }
    </script>
</body>

</html>