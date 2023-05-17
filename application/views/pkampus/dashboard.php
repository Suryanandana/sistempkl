<!-- Navbar -->
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
	<div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
		data-kt-sticky-offset="{default: '200px', lg: '300px'}">
		<div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
			<div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
				data-kt-swapper="true" data-kt-swapper-mode="prepend"
				data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
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
					<div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px"
						data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
						data-kt-menu-flip="bottom">
						<img alt="Pic" src="<?= (isset($data->foto)) ? base_url('resource/img/fotoPembimbingKampus/'.$data->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- Navbar End -->