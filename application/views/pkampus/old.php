<!DOCTYPE html>
<html lang="en">
<head><base href="">
    <meta charset="utf-8" />
    <title>Sistem Manajemen PKL</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
    <link href="<?= base_url('/resource/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
</head>
<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
<?php var_dump($this->session->userdata('status')); ?>
    <div class="d-flex flex-column flex-root">
        <div class="page d-flex flex-row flex-column-fluid">
            <div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
            <!-- Sidebar -->
                <div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
                    <a href="index.html">
                        <h2>Manajemen PKL</h2>
                    </a>
                </div>
                <div class="aside-menu flex-column-fluid px-3 px-lg-6">
                    <div class="menu menu-column menu-pill menu-title-gray-600 menu-icon-gray-400 menu-state-primary menu-arrow-gray-500 menu-active-bg-primary fw-bold fs-5 my-5 mt-lg-2 mb-lg-0" id="kt_aside_menu" data-kt-menu="true">
                        <div class="hover-scroll-y me-n3 pe-3" id="kt_aside_menu_scroll" data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto" data-kt-scroll-wrappers="#kt_aside_menu" data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-offset="20px">
                            <div class="menu-item mb-1">
                                <a class="menu-link active" href="index.html">
                                    <span class="menu-icon">
                                        <!-- icon -->
                                    </span>
                                    <span class="menu-title">Dashboards</span>
                                </a>
                            </div>
                            <div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
                                <span class="menu-link">
                                    <span class="menu-icon">
                                        <!-- Icon -->
                                    </span>
                                    <span class="menu-title">Aktifitas Mahasiswa</span>
                                    <span class="menu-arrow"></span>
                                </span>
                                <div class="menu-sub menu-sub-accordion">
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Aktifitas PKL</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Bimbingan Mahasiswa</span>
                                        </a>
                                    </div>
                                    <div class="menu-item">
                                        <a class="menu-link" href="#">
                                            <span class="menu-bullet">
                                                <span class="bullet bullet-dot"></span>
                                            </span>
                                            <span class="menu-title">Nilai Mahasiswa</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="menu-item mb-1">
                                <a class="menu-link" href="overview.html">
                                    <span class="menu-icon">
                                        <!-- icon -->
                                    </span>
                                    <span class="menu-title">Setting Akun</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="aside-footer flex-column-auto px-6 pb-5" id="kt_aside_footer">
                    <a href="javascript:void(0)" onclick="logout();" class="btn btn-light-danger w-100" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" title="Upgrade to Pro to get &lt;br/&gt;the best of Rider">Log Out</a>
                </div>
            </div>
            <!-- Sidebar End -->

            <!-- Navbar -->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
                    <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
                        <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                            <h1 class="text-dark fw-bolder mt-1 mb-1 fs-2">Dashboard
                            <small class="text-muted fs-6 fw-normal ms-1"></small></h1>
                            <ul class="breadcrumb fw-bold fs-base mb-1">
                                <li class="breadcrumb-item text-muted">
                                    <a href="index.html" class="text-muted text-hover-primary">Home</a>
                                </li>
                                <li class="breadcrumb-item text-dark">Dashboards</li>
                            </ul>
                        </div>
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
                                    <img alt="Pic" src="<?= base_url('/resource/img/avatars/150-1.jpg'); ?>" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Navbar End -->

            <!-- Content -->
            <!-- Content End -->
        </div>
    </div>
    <script src="<?= base_url('/resource/js/scripts.bundle.js'); ?>"></script>
    <script src="<?= base_url('/resource/js/custom/widget.js'); ?>"></script>
    <script>
        function logout(){
            if (confirm("Apakah yakin melakukan logout?")){
                window.open("<?php echo base_url(); ?>clogin/logout","_self");	
            }	
        }
    </script>
</body>
</html>