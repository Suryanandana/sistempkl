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
                    <li class="breadcrumb-item text-muted">Aktivitas Mahasiswa</li>
                    <li class="breadcrumb-item text-dark">Aktivitas PKL</li>
                </ul>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="bottom">
                        <img alt="Pic" style="object-fit: cover;"
                            src="<?= (isset($data->foto)) ? base_url('resource/img/fotoPembimbingKampus/' . $data->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <div class="container" id="kt_content_container">
            <div class="d-flex flex-column">
                <div class="w-100 mb-10 bg-white p-10">
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
                    <div class="table-responsive" id="chart-profile-visit">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="fw-bolder">No</th>
                                    <th class="fw-bolder">NIM</th>
                                    <th class="fw-bolder">Nama Mahasiswa</th>
                                    <th class="fw-bolder">Judul Aktivitas</th>
                                    <th class="fw-bolder">Deskripsi Aktivitas</th>
                                    <th class="fw-bolder">Tanggal Aktivitas</th>
                                    <th class="fw-bolder">Dokumen</th>
                                    <th class="fw-bolder">Validasi Kampus</th>
                                    <th class="fw-bolder">Validasi Industri</th>
                                    <th class="fw-bolder">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($aktivitas as $row): ?>
                                    <tr id="baris<?= $no ?>">
                                        <td scope="row">
                                            <?= $no ?>
                                        </td>
                                        <td>
                                            <?= $row->nim ?>
                                        </td>
                                        <td>
                                            <?= $row->nama_lengkap ?>
                                        </td>
                                        <td>
                                            <?= $row->nama_aktivitas ?>
                                        </td>
                                        <td>
                                            <?= $row->deskripsi_aktivitas ?>
                                        </td>
                                        <td>
                                            <?= $row->tanggal_aktivitas ?>
                                        </td>
                                        <td>
                                            <?= $row->dokumen ?>
                                        </td>
                                        <td>
                                            <?= $row->validasi_kampus ?>
                                        </td>
                                        <td>
                                            <?= $row->validasi_industri ?>
                                        </td>
                                        <td>
                                            <a href="" class="btn btn-success" data-bs-toggle="modal"
                                                data-bs-target="#kt_modal_1" onclick="detail('baris<?= $no ?>', '<?= $row->id_aktivitas ?>')">Validasi</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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
                <h5 class="modal-title text-white">Input Nilai Mahasiswa</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="<?= base_url('cpkampus/validasiaktivitas'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" id="detail-id" name="id_aktivitas">
                            <label>NIM</label>
                            <input disabled type="text" class="form-control" id="detail-nim" />
                        </div>
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Nama Mahasiswa</label>
                            <input disabled type="text" class="form-control" id="detail-nama" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Judul Aktivitas</label>
                            <input disabled type="text" class="form-control" id="detail-judul" />
                        </div>
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Deskripsi Aktivitas</label>
                            <input disabled type="text" class="form-control" id="detail-deskripsi" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Tanggal Aktivitas</label>
                            <input disabled type="text" class="form-control" id="detail-tanggal" />
                        </div>
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Validasi Kampus</label>
                            <select name="validasi_kampus" class="form-select" required>
                                <option value="">Belum Tervalidasi</option>
                                <option value="Valid">Valid</option>
                                <option value="Tidak Valid">Tidak Valid</option>
                            </select>
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



<script src="<?= base_url('/resource/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
<script src="<?= base_url('/resource/js/bootstrap.min.js'); ?>"></script>

<script src="assets/vendors/apexcharts/apexcharts.js"></script>
<script src="<?= base_url('/resource/js/pages/dashboard.js'); ?>"></script>

<script src="<?= base_url('/resource/js/main.js'); ?>"></script>

<!-- Log out konfirmation script -->
<script>
    function logout() {
        if (confirm("Apakah yakin melakukan logout?")) {
            window.open("<?php echo base_url(); ?>clogin/logout", "_self");
        }
    }
    function detail(baris, id){
        const data = document.querySelectorAll('#'+baris+' td');
        document.getElementById('detail-id').value = id
        document.getElementById('detail-nim').value = data[1].innerText
        document.getElementById('detail-nama').value = data[2].innerText
        document.getElementById('detail-judul').value = data[3].innerText
        document.getElementById('detail-deskripsi').value = data[4].innerText
        document.getElementById('detail-tanggal').value = data[5].innerText
    }
</script>
</body>