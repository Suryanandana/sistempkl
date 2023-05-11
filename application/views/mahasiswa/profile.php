<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<title>Sistem Manajemen PKL</title>
		<link rel="canonical" href="Https://preview.keenthemes.com/rider-free" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" />
		<link href="<?= base_url('/resource/css/style.bundle.css'); ?>" rel="stylesheet" type="text/css" />
	</head>
	<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed aside-fixed">
    <?php var_dump($this->session->userdata('status')); ?>
		<div class="d-flex flex-column flex-root">
			<div class="page d-flex flex-row flex-column-fluid">
				<div id="kt_aside" class="aside bg-white" data-kt-drawer="true" data-kt-drawer-name="aside" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true" data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_aside_toggle">
					<div class="aside-logo flex-column-auto pt-9 pb-7 px-9" id="kt_aside_logo">
						<a href="index.html">
							<h2>Manajemen PKL</h2>
						</a>
					</div>
					<div class="aside-menu flex-column-fluid px-3 px-lg-6">
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
											<span class="menu-title">Upload Surat</span>
											<span class="menu-arrow"></span>
										</span>
										<div class="menu-sub menu-sub-accordion">
											<div class="menu-item">
												<a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Pengajuan PKL</span>
												</a>
											</div>
											<div class="menu-item">
												<a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Industri</span>
												</a>
											</div>
										</div>
									</div>
									<div data-kt-menu-trigger="click" class="menu-item menu-accordion mb-1">
										<span class="menu-link">
											<span class="menu-icon">
												<!-- Icon -->
											</span>
											<span class="menu-title">Aktifitas</span>
											<span class="menu-arrow"></span>
										</span>
										<div class="menu-sub menu-sub-accordion">
											<div class="menu-item">
												<a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Praktek Kerja Lapangan</span>
												</a>
											</div>
											<div class="menu-item">
												<a class="menu-link" href="#">
													<span class="menu-bullet">
														<span class="bullet bullet-dot"></span>
													</span>
													<span class="menu-title">Bimbingan</span>
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
					</div>
					<div class="aside-footer flex-column-auto px-6 pb-5" id="kt_aside_footer">
						<a href="javascript:void(0)" onclick="logout();" class="btn btn-light-danger w-100" data-bs-toggle="tooltip" data-bs-html="true" data-bs-trigger="hover" title="Upgrade to Pro to get &lt;br/&gt;the best of Rider">Log Out</a>
					</div>
				</div>
				<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
					<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header" data-kt-sticky-offset="{default: '200px', lg: '300px'}">
						<div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
							<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0" data-kt-swapper="true" data-kt-swapper-mode="prepend" data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
								<h1 class="text-dark fw-bolder mt-1 mb-1 fs-2">Profile Overview</h1>
								<ul class="breadcrumb fw-bold fs-base mb-1">
									<li class="breadcrumb-item text-muted">
										<a href="index.html" class="text-muted text-hover-primary">Home</a>
									</li>
									<li class="breadcrumb-item text-muted">Account</li>
									<li class="breadcrumb-item text-dark">Overview</li>
								</ul>
							</div>
							<div class="d-flex align-items-stretch flex-shrink-0">
								<div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
									<div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end" data-kt-menu-flip="bottom">
										<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
						<div class="container" id="kt_content_container">
							<div class="d-flex flex-column flex-xl-row">
								<div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
									<div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar" data-kt-sticky-offset="{default: false, xl: '80px'}" data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto" data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
										<div class="card-body pt-10 p-10">
											<div class="d-flex flex-center flex-column mb-10">
												<div class="symbol mb-3 symbol-100px symbol-circle">
													<img alt="Pic" src="assets/media/avatars/150-1.jpg" />
												</div>
												<a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1"><?= $this->session->userdata('username') ?></a>
												<div class="fs-6 fw-bold text-gray-400 mb-2">Art Director</div>
												<div class="d-flex flex-center">
													<a href="#" class="btn btn-sm btn-light-primary py-2 px-4 fw-bolder me-2" data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">Send Message</a>
												</div>
											</div>
											<div class="border border-dashed border-gray-300 bg-lighten card-rounded p-6">
												<h5 class="mb-4">Account Status</h5>
												<div class="mb-3">
													<span class="badge bg-success me-2 card-rounded">Basic Bundle</span>
													<span class="fw-bold text-gray-600">$149.99 / Year</span>
												</div>
												<a href="#" class="text-link fs-7 fw-bolder" data-bs-toggle="modal" data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
											</div>
										</div>
									</div>
								</div>
								<div class="flex-lg-row-fluid ms-lg-10">
									<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
										<div class="card-header cursor-pointer">
											<div class="card-title m-0">
												<h3 class="fw-bolder m-0">Profile Details</h3>
											</div>
											<a href="#" class="btn btn-primary align-self-center">Edit Profile</a>
										</div>
										<div class="card-body p-9">
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Full Name</label>
												<div class="col-lg-8">
													<span class="fw-bolder fs-6 text-dark">Max Smith</span>
												</div>
											</div>
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Company</label>
												<div class="col-lg-8 fv-row">
													<span class="fw-bold fs-6">Keenthemes</span>
												</div>
											</div>
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Contact Phone
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Phone number must be active"></i></label>
												<div class="col-lg-8 d-flex align-items-center">
													<span class="fw-bolder fs-6 me-2">044 3276 454 935</span>
													<span class="badge badge-success">Verified</span>
												</div>
											</div>
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Company Site</label>
												<div class="col-lg-8">
													<a href="#" class="fw-bold fs-6 text-dark text-hover-primary">keenthemes.com</a>
												</div>
											</div>
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Country
												<i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip" title="Country of origination"></i></label>
												<div class="col-lg-8">
													<span class="fw-bolder fs-6 text-dark">Germany</span>
												</div>
											</div>
											<div class="row mb-7">
												<label class="col-lg-4 fw-bold text-muted">Communication</label>
												<div class="col-lg-8">
													<span class="fw-bolder fs-6 text-dark">Email, Phone</span>
												</div>
											</div>
											<div class="row mb-10">
												<label class="col-lg-4 fw-bold text-muted">Allow Changes</label>
												<div class="col-lg-8">
													<span class="fw-bold fs-6">Yes</span>
												</div>
											</div>
											<div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
												<span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
													<svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
														<circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
														<rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
														<rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
													</svg>
												</span>
												<div class="d-flex flex-stack flex-grow-1">
													<!--begin::Content-->
													<div class="fw-bold">
														<h4 class="text-gray-800 fw-bolder">We need your attention!</h4>
														<div class="fs-6 text-gray-600">Your payment was declined. To start using tools, please
														<a class="fw-bolder" href="account/billing.html">Add Payment Method</a>.</div>
													</div>
													<!--end::Content-->
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<script src="<?= base_url('/resource/js/scripts.bundle.js'); ?>"></script>
		<script src="<?= base_url('/resource/js/custom/widgets.js'); ?>"></script>
        <script>
        function logout(){
            if (confirm("Apakah yakin melakukan logout?")){
                window.open("<?php echo base_url(); ?>clogin/logout","_self");	
            }	
        }
    </script>
	</body>
</html>