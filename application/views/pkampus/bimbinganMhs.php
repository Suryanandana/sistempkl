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
                    <li class="breadcrumb-item text-dark">Bimbingan Mahasiswa</li>
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
                <div class="table-responsive" id="chart-profile-visit">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw-bolder">No</th>
                                <th class="fw-bolder">Nama Mahasiswa</th>
                                <th class="fw-bolder">ID Bimbingan</th>
                                <th class="fw-bolder">Keterangan Bimbingan</th>
                                <th class="fw-bolder">Tanggal Bimbingan</th>
                                <th class="fw-bolder">Status</th>
                                <th class="fw-bolder">Aksi</th>
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
                                                <?= $row->id_bimbingan ?>
                                            </td>
                                            <td>
                                                <?= $row->keterangan_bimbingan ?>
                                            </td>
                                            <td>
                                                <?= $row->tanggal_bimbingan?>
                                            </td>
                                            <td>
                                                <?= $row->status ?>
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button onclick="edit('baris<?= $no ?>', '<?= $row->id_bimbingan ?>')"
                                                    class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#edit-modal">
                                                    <i class="bi bi-pencil-square"></i>
                                                </button>
                                            </th>
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

<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cpkampus/editbimbingan') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-id_bimbingan" name="id_bimbingan">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-status">Status Bimbingan</label>
                    <select class="form-select" name="status" id="tambah-status">
                        <option value="belum tervalidasi">Belum Tervalidasi</option>
                        <option value="valid">Valid</option>
                        <option value="tidak valid">Tidak Valid</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-warning" value="Edit Data">
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