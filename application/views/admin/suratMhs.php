<div class="page-heading">
    <h3>Data Surat Mahasiswa Valid</h3>
</div>
<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <?php if ($this->session->flashdata('pesan_berhasil')): ?>
                            <div class="alert alert-success" role="alert">
                                <?= $this->session->flashdata('pesan_berhasil'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <!-- fitur pencarian (cukup ubah link actionnya aja) -->
                                <form action="<?= base_url('cadmin/suratMhs') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari nama Mahasiswa"
                                            aria-label="Example text with button addon"
                                            aria-describedby="button-addon1">
                                        <input class="btn btn-outline-secondary" type="submit" id="button-addon1"
                                            value="Cari">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="table-responsive" id="chart-profile-visit">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>nim</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>surat resmi</th>
                                        <th>surat bimbingan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($data as $row): ?>
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
                                                <?= $row->kelas ?>
                                            </td>
                                            <td>
                                                <?php if(isset($row->surat_resmi)) : ?>
                                                <a href="<?= base_url() . 'cadmin/downloadsuratresmi?file=' . $row->surat_resmi ?>">Download</a>                                                
                                                <?php else : ?>
                                                Belum upload surat
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                            <?php if(isset($row->surat_bimbingan)) : ?>
                                                <a href="<?= base_url() . 'cadmin/downloadsuratresmi?file=' . $row->surat_bimbingan ?>">Download</a>                                                
                                                <?php else : ?>
                                                Belum upload surat
                                                <?php endif; ?>
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button onclick="edit('baris<?= $no ?>', '<?= $row->nim ?>')"
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
                            <?php echo $links; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Upload Surat Resmi PKL</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/uploadSuratResmi') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-nim" name="nim">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-nim">NIM</label>
                    <input type="text" id="edit-nimMhs" name="id_nim" class="form-control" disabled>
                    <label for="edit-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="edit-nama_lengkap" name="nama_lengkap" class="form-control" disabled>
                    <label for="edit-nama_lengkap">Upload Surat</label>
                    <input type="file" name="surat" class="form-control" required>
                    <label for="jenis_surat">Jenis Surat</label>
                    <select class="form-select" aria-label="Default select example" name="jenis_surat" required>
                        <option selected value="">Pilih</option>
                        <option value="surat resmi pkl">Surat Resmi</option>
                        <option value="surat bimbingan">Surat Bimbingan</option>
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
</script>
</body>
<script>
    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');
        document.getElementById('edit-nimMhs').value = td[1].innerText
        document.getElementById('edit-nama_lengkap').value = td[2].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('edit-nim').value = id;
    }
</script>