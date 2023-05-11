<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
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
                    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="bottom">
                        <img alt="Pic" src="<?= base_url('resource/img/avatars/150-1.jpg'); ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <div class="container" id="kt_content_container">
            <div class="d-flex flex-column flex-xl-row">
                <div class="flex-column flex-lg-row-auto w-100 w-xl-325px mb-10">
                    <div class="card card-flush" data-kt-sticky="true" data-kt-sticky-name="account-navbar"
                        data-kt-sticky-offset="{default: false, xl: '80px'}"
                        data-kt-sticky-width="{lg: '250px', xl: '325px'}" data-kt-sticky-left="auto"
                        data-kt-sticky-top="90px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                        <div class="card-body pt-10 p-10">
                            <div class="d-flex flex-center flex-column mb-10">
                                <div class="symbol mb-3 symbol-100px symbol-circle">
                                    <img alt="Pic" src="<?= base_url('resource/img/avatars/150-1.jpg'); ?>" />
                                </div>
                                <a href="#"
                                    class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1"><?= $this->session->userdata('username') ?></a>
                                <div class="fs-6 fw-bold text-gray-400 mb-2">Art Director</div>
                                <div class="d-flex flex-center">
                                    <a href="#" class="btn btn-sm btn-light-primary py-2 px-4 fw-bolder me-2"
                                        data-kt-drawer-show="true" data-kt-drawer-target="#kt_drawer_chat">Send
                                        Message</a>
                                </div>
                            </div>
                            <div class="border border-dashed border-gray-300 bg-lighten card-rounded p-6">
                                <h5 class="mb-4">Account Status</h5>
                                <div class="mb-3">
                                    <span class="badge bg-success me-2 card-rounded">Basic Bundle</span>
                                    <span class="fw-bold text-gray-600">$149.99 / Year</span>
                                </div>
                                <a href="#" class="text-link fs-7 fw-bolder" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
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
                            <!-- button untuk memunculkan pop up form -->
                            <button class="btn btn-primary align-self-center" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_1">Edit Profile</button>
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
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Phone number must be active"></i></label>
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
                                    <i class="fas fa-exclamation-circle ms-1 fs-7" data-bs-toggle="tooltip"
                                        title="Country of origination"></i></label>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px"
                                        viewBox="0 0 24 24" version="1.1">
                                        <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                        <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                        <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                                    </svg>
                                </span>
                                <div class="d-flex flex-stack flex-grow-1">
                                    <div class="fw-bold">
                                        <h4 class="text-gray-800 fw-bolder">We need your attention!</h4>
                                        <div class="fs-6 text-gray-600">Your payment was declined. To start using
                                            tools, please
                                            <a class="fw-bolder" href="account/billing.html">Add Payment Method</a>.
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

<!-- pop up form -->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Modal title</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                <p>Modal body text goes here.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>