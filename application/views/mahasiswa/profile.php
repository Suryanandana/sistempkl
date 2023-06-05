<?php $data = $data[0]; // ambil data dari index ke 0 ?>
<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <h1 class="text-dark fw-bolder mt-1 mb-1 fs-2"></h1>
                <ul class="breadcrumb fw-bold fs-base mb-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Account</li>
                    <li class="breadcrumb-item text-dark">Profil</li>
                </ul>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="bottom">
                        <img alt="Pic" style="object-fit: cover;"
                            src="<?= (isset($data->foto)) ? base_url('resource/img/fotoMahasiswa/' . $data->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
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
                                    <img alt="Pic" style="object-fit: cover;"
                                        src="<?= (isset($data->foto)) ? base_url('resource/img/fotoMahasiswa/' . $data->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
                                </div>
                                <a href="#" class="fs-2 text-gray-800 text-hover-primary fw-bolder mb-1">
                                    <?= $data->nama_lengkap; ?>
                                </a>
                                <div class="fs-6 fw-bold text-gray-400 mb-2">Mahasiswa</div>
                                <div class="fs-6 fw-bold text-gray-400">Politeknik Negeri Bali</div>
                            </div>
                            <!-- <div class="border border-dashed border-gray-300 bg-lighten card-rounded p-6">
                                <h5 class="mb-4">Account Status</h5>
                                <div class="mb-3">
                                    <span class="badge bg-success me-2 card-rounded">Basic Bundle</span>
                                    <span class="fw-bold text-gray-600">$149.99 / Year</span>
                                </div>
                                <a href="#" class="text-link fs-7 fw-bolder" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upgrade_plan">Upgrade to Pro</a>
                            </div> -->
                        </div>
                    </div>
                </div>
                <div class="flex-lg-row-fluid ms-lg-10">
                    <div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
                        <div class="card-header cursor-pointer">
                            <div class="card-title m-0">
                                <h3 class="fw-bolder m-0">Detail Profil</h3>
                            </div>
                            <!-- button untuk memunculkan pop up form -->
                            <button class="btn btn-primary align-self-center" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_1">Edit Profile</button>
                        </div>
                        <div class="card-body p-9">
                            <?php if ($this->session->flashdata('pesan_berhasil')): ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('pesan_berhasil'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('pesan_gagal')): ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('pesan_gagal'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">NIM</label>
                                <div class="col-lg-8">
                                    <span class="fw-bolder fs-6 text-dark">
                                        <?= $data->nim; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Email</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->email; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Nama Lengkap</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->nama_lengkap; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Kelas</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->kelas; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Nomer Hp</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->no_hp; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Jenis Kelamin</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->jenis_kelamin; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Tempat Lahir</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->tempat_lahir; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Tanggal Lahir</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->tanggal_lahir; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Alamat</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->alamat; ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row mb-7">
                                <label class="col-lg-4 fw-bold text-muted">Agama</label>
                                <div class="col-lg-8 fv-row">
                                    <span class="fw-bold fs-6">
                                        <?= $data->agama; ?>
                                    </span>
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
                                        <h4 class="text-gray-800 fw-bolder">Perhatian!</h4>
                                        <div class="fs-6 text-gray-600">Pastikan data yang diinput sudah benar.
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php //endforeach; ?>
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
                <h5 class="modal-title text-white">Data Profile Mahasiswa</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="<?= base_url('cmahasiswa/simpanprofile'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <!-- nim yang digunakan sebagai pk untuk mengupdate data -->
                            <input type="hidden" name="nim" value="<?= $data->nim; ?>">
                            <label>NIM</label>
                            <!-- nim yang ditampilkan kepada user tapi tidak bisa dubah -->
                            <input type="text" class="form-control" value="<?= $data->nim; ?>" name="nim" disabled />
                        </div>
                        <div class="col-6">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" value="<?= $data->email; ?>" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Nama Lengkap</label>
                            <input type="text" class="form-control" name="nama_lengkap"
                                value="<?= $data->nama_lengkap; ?>" />
                        </div>
                        <div class="col-6">
                            <label>Kelas (2 karakter)</label>
                            <input type="text" class="form-control" name="kelas" value="<?= $data->kelas; ?>" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Nomer Hp</label>
                            <input type="text" class="form-control" name="no_hp" value="<?= $data->no_hp; ?>" />
                        </div>
                        <div class="col-6">
                            <label>Jenis Kelamin</label>
                            <!-- kusus untuk input select gunakan id -->
                            <select class="form-select" name="jenis_kelamin" id="gender">
                                <option value="">Pilih jenis kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Tempat Lahir</label>
                            <input type="text" class="form-control" name="tempat_lahir"
                                value="<?= $data->tempat_lahir; ?>" />
                        </div>
                        <div class="col-6">
                            <label>Tanggal Lahir</label>
                            <input type="date" class="form-control" name="tanggal_lahir"
                                value="<?= $data->tanggal_lahir; ?>" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Alamat</label>
                            <input type="text" class="form-control" name="alamat" value="<?= $data->alamat; ?>" />
                        </div>
                        <div class="col-6">
                            <label>Agama</label>
                            <!-- kusus untuk input select gunakan id -->
                            <select class="form-select" name="agama" id="agama">
                                <option value="">Pilih agama</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <label>Foto</label>
                            <input type="file" class="form-control" name="foto" />
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- javascript untuk memilih option secara langsung saat edit profile -->
<script>
    // ambil jenis_kelamin pada database lalu masukkan ke variabel genderValue
    var genderValue = "<?= $data->jenis_kelamin; ?>";
    // ambil option yang sesuai dengan data pada database (#gender diambil dari id select pada pop up)
    var genderOption = document.querySelector("#gender option[value='" + genderValue + "']");
    // pilih gender tersebut secara otomatis
    genderOption.selected = true;

    // ambil agama pada database lalu masukkan ke variabel genderValue
    var agamaValue = "<?= $data->agama; ?>";
    // ambil option yang sesuai dengan data pada database
    var agamaOption = document.querySelector("#agama option[value='" + agamaValue + "']");
    // pilih agama tersebut secara otomatis
    agamaOption.selected = true;
</script>