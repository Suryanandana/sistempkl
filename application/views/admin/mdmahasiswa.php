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
                        <div id="chart-profile-visit">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>nim</th>
                                        <th>email</th>
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
                                            <th scope="row">
                                                <?= $no ?>
                                            </th>
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
                                                <?= $row->foto ?>
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
                    <input type="text" id="tambah-NIM" name="nim" class="form-control">
                    <label for="tambah-nama">email</label>
                    <input type="text" id="tambah-email" name="email" class="form-control">
                    <label for="tambah-nama">Nama Lengkap</label>
                    <input type="text" id="tambah-nama_lengap" name="nama_lengkap" class="form-control">
                    <label for="tambah-nama">kelas</label>
                    <input type="text" id="tambah-kelas" name="kelas" class="form-control">
                    <label for="tambah-nama">NO. HP</label>
                    <input type="text" id="tambah-no_hp" name="bo_hp" class="form-control">
                    <label for="tambah-nama">Jenis Kelamin</label>
                    <input type="text" id="tambah-jenis_kelamin" name="jenis_kelamin" class="form-control">
                    <label for="tambah-nama">Tempat Lahir</label>
                    <input type="text" id="tambah-tempat_lahir" name="tempat_lahir" class="form-control">
                    <label for="tambah-alamat">Tanggal Lahir</label>
                    <input type="text" id="tambah-tanggal_lahir" name="tanggal_lahir" class="form-control">
                    <label for="tambah-nama">Alamat</label>
                    <input type="text" id="tambah-alamat" name="alamat" class="form-control">
                    <label for="tambah-nama">Agama</label>
                    <input type="text" id="tambah-agama" name="agama" class="form-control">
                    <label for="tambah-telp">foto</label>
                    <input type="text" id="tambah-foto" name="foto" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Tambah Data">
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
        function logout(){
            if (confirm("Apakah yakin melakukan logout?")){
                window.open("<?php echo base_url(); ?>clogin/logout","_self");	
                    
            }	
        }
    </script>
</body>

</html>