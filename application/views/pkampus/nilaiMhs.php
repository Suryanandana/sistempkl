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
                    <li class="breadcrumb-item text-dark">Nilai Mahasiswa</li>
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
                        <button class="btn btn-primary mb-8" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                            Tambah Nilai
                        </button>
                        <?php if($this->session->flashdata('pesan_berhasil')) : ?>
                                <div class="alert alert-success">
                                    <?= $this->session->flashdata('pesan_berhasil'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($this->session->flashdata('pesan_gagal')) : ?>
                                <div class="alert alert-danger">
                                    <?= $this->session->flashdata('pesan_gagal'); ?>
                                </div>
                            <?php endif; ?>
                                <div class="table-responsive" id="chart-profile-visit">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="fw-bolder">No</th>
                                                <th class="fw-bolder">Nama Mahasiswa</th>
                                                <th class="fw-bolder">Nilai Motivasi Kampus</th>
                                                <th class="fw-bolder">Nilai Kreativitas Kampus</th>
                                                <th class="fw-bolder">Nilai Disiplin Kampus</th>
                                                <th class="fw-bolder">Nilai Pembahasan Kampus</th>
                                                <th class="fw-bolder">Feedback Kampus</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $no=1; ?>
                                            <?php foreach ($data as $row): ?>
                                                        <tr id="baris<?= $no ?>">
                                                            <th scope="row">
                                                                <?= $no++ ?>
                                                            </th>
                                                            <td>
                                                                <?= $row->nama_lengkap?>
                                                            </td>
                                                            <td>
                                                                <?= $row->nilai_motivasi_kampus ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->nilai_kreativitas_kampus ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->nilai_disiplin_kampus?>
                                                            </td>
                                                            <td>
                                                                <?= $row->nilai_pembahasan_kampus ?>
                                                            </td>
                                                            <td>
                                                                <?= $row->feedback_kampus ?>
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
                <h5 class="modal-title text-white">Tambah Nilai Mahasiswa</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="<?= base_url('cpkampus/tambahnilai'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <input type="hidden" id="tambah-id_nilai" name="id_nilai">
                            <label>Data Diri Mahasiswa</label>
                            <select class="form-select" name="nim" id="nim">
                                <option value="">Pilih NIM</option>
                                <?php foreach ($listNIM as $row): ?>
                                <option value="<?= $row->nim ?>"><?= $row->nim ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col-6">
                            <label>Nilai Motivasi Kampus</label>
                            <input type="text" class="form-control" name="nilai_motivasi_kampus" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Nilai Kreativitas Kampus</label>
                            <input type="text" class="form-control" name="nilai_kreativitas_kampus" />
                        </div>
                        <div class="col-6">
                            <label>Nilai Disiplin Kampus</label>
                            <input type="text" class="form-control" name="nilai_disiplin_kampus" />
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-6">
                            <label>Nilai Pembahasan Kampus</label>
                            <input type="text" class="form-control" name="nilai_pembahasan_kampus" />
                        </div>
                        <div class="col-6">
                            <label>Feedback Kampus</label>
                            <input type="text" class="form-control" name="feedback_kampus" />
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
function edit(baris, id) {
// fungsinya sama seperti hapus hanya beda penamaan
// document.getElementById('edit-idbimbingan').value = td[0].innerText
// isi input id_industri dengan parameter id untuk menghapus baris
document.getElementById('edit-id_bimbingan').value = id
}
</script>
</body>