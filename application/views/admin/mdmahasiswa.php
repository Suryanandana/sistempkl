<div class="page-heading">
    <h3>Data Mahasiswa</h3>
</div>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-modal">
    Tambah Data
</button>
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
                                <form action="<?= base_url('cadmin/tampilmahasiswa') ?>" method="get">
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
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Kelas</th>
                                        <th>No. HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>agama</th>
                                        <th>foto</th>
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
                                                <?= $row->email ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_lengkap ?>
                                            </td>
                                            <td>
                                                <?= $row->kelas ?>
                                            </td>
                                            <td>
                                                <?= $row->no_hp ?>
                                            </td>
                                            <td>
                                                <?= $row->jenis_kelamin ?>
                                            </td>
                                            <td>
                                                <?= $row->tempat_lahir ?>
                                            </td>
                                            <td>
                                                <?= $row->tanggal_lahir ?>
                                            </td>
                                            <td>
                                                <?= $row->alamat ?>
                                            </td>
                                            <td>
                                                <?= $row->agama ?>
                                            </td>
                                            <td>
                                                <img alt="Pic" width="20" style="object-fit: cover;"
                                                    src="<?= (isset($row->foto)) ? base_url('resource/img/fotoMahasiswa/' . $row->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button onclick="hapus('baris<?= $no ?>', '<?= $row->nim ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
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


<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/tambahmahasiswa') ?>" method="POST">
                <div class="modal-body">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="tambah-nama">NIM</label>
                    <input type="text" id="tambah-NIM" name="nim" class="form-control" required>
                    <label for="tambah-nama">Email</label>
                    <input type="text" id="tambah-email" name="email" class="form-control">
                    <label for="tambah-nama">Nama Lengkap</label>
                    <input type="text" id="tambah-nama_lengap" name="nama_lengkap" class="form-control">
                    <label for="tambah-nama">kelas</label>
                    <input type="text" id="tambah-kelas" name="kelas" class="form-control">
                    <label for="tambah-nama">NO. HP</label>
                    <input type="text" id="tambah-no_hp" name="bo_hp" class="form-control">
                    <label for="tambah-nama">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="tambah-jenis_kelamin">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="tambah-nama">Tempat Lahir</label>
                    <input type="text" id="tambah-tempat_lahir" name="tempat_lahir" class="form-control">
                    <label for="tambah-alamat">Tanggal Lahir</label>
                    <input type="date" id="tambah-tanggal_lahir" name="tanggal_lahir" class="form-control">
                    <label for="tambah-nama">Alamat</label>
                    <input type="text" id="tambah-alamat" name="alamat" class="form-control">
                    <label for="tambah-nama">Agama</label>
                    <select class="form-select" name="agama" id="tambah-agama">
                        <option value="">Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Budha">BUdha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>
</div>


<div class="modal fade" id="hapus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/hapusmahasiswa') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="hapus-nim" name="nim">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="hapus-nim">NIM</label>
                    <input type="text" id="hapus-nimMhs" name="nim" class="form-control">
                    <label for="hapus-email">Email</label>
                    <input type="text" id="hapus-email" name="email" class="form-control">
                    <label for="hapus-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="hapus-nama_lengkap" name="nama_lengkap" class="form-control">
                    <label for="hapus-kelas">kelas</label>
                    <input type="text" id="hapus-kelas" name="kelas" class="form-control">
                    <label for="hapus-no_hp">NO. HP</label>
                    <input type="text" id="hapus-no_hp" name="no_hp" class="form-control">
                    <label for="hapus-jenis_kelamin">Jenis Kelamin</label>
                    <input type="text" id="hapus-jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <label for="hapus-tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="hapus-tempat_lahir" name="tempat_lahir" class="form-control">
                    <label for="hapus-tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="hapus-tanggal_lahir" name="tanggal_lahir" class="form-control">
                    <label for="hapus-alamat">Alamat</label>
                    <input type="text" id="hapus-alamat" name="alamat" class="form-control">
                    <label for="hapus-agama">Agama</label>
                    <input type="text" id="hapus-agama" name="agama" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-danger" value="Hapus Data">
                </div>
            </form>
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
            <form action="<?= base_url('cadmin/editmahasiswa') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-nim" name="id_nim">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-nim">NIM</label>
                    <input type="text" id="edit-nimMhs" name="nim" class="form-control">
                    <label for="edit-email">Email</label>
                    <input type="text" id="edit-email" name="email" class="form-control">
                    <label for="edit-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="edit-nama_lengkap" name="nama_lengkap" class="form-control">
                    <label for="edit-kelas">kelas</label>
                    <input type="text" id="edit-kelas" name="kelas" class="form-control">
                    <label for="edit-no_hp">NO. HP</label>
                    <input type="text" id="edit-no_hp" name="no_hp" class="form-control">
                    <label for="edit-jenis_kelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="tambah-jenis_kelamin">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="edit-tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="edit-tempat_lahir" name="tempat_lahir" class="form-control">
                    <label for="edit-tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="edit-tanggal_lahir" name="tanggal_lahir" class="form-control">
                    <label for="edit-alamat">Alamat</label>
                    <input type="text" id="edit-alamat" name="alamat" class="form-control">
                    <label for="edit-agama">Agama</label>
                    <select class="form-select" name="agama" id="tambah-agama">
                        <option value="">Agama</option>
                        <option value="Islam">Islam</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Protestan">Protestan</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Budha">BUdha</option>
                        <option value="Konghucu">Konghucu</option>
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
    function hapus(baris, id) {
        const td = document.querySelectorAll('#' + baris + ' td');
        document.getElementById('hapus-nimMhs').value = td[1].innerText
        document.getElementById('hapus-email').value = td[2].innerText
        document.getElementById('hapus-nama_lengkap').value = td[3].innerText
        document.getElementById('hapus-kelas').value = td[4].innerText
        document.getElementById('hapus-no_hp').value = td[5].innerText
        document.getElementById('hapus-jenis_kelamin').value = td[6].innerText
        document.getElementById('hapus-tempat_lahir').value = td[7].innerText
        document.getElementById('hapus-tanggal_lahir').value = td[8].innerText
        document.getElementById('hapus-alamat').value = td[9].innerText
        document.getElementById('hapus-agama').value = td[10].innerText
        document.getElementById('hapus-foto').value = td[11].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-nim').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');
        document.getElementById('edit-nimMhs').value = td[1].innerText
        document.getElementById('edit-email').value = td[2].innerText
        document.getElementById('edit-nama_lengkap').value = td[3].innerText
        document.getElementById('edit-kelas').value = td[4].innerText
        document.getElementById('edit-no_hp').value = td[5].innerText
        document.getElementById('edit-jenis_kelamin').value = td[6].innerText
        document.getElementById('edit-tempat_lahir').value = td[7].innerText
        document.getElementById('edit-tanggal_lahir').value = td[8].innerText
        document.getElementById('edit-alamat').value = td[9].innerText
        document.getElementById('edit-agama').value = td[10].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('edit-nim').value = id;
    }
</script>