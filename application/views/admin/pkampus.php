<div class="page-heading">
    <h3>Data Pembimbing Kampus</h3>
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
                                <form action="<?= base_url('cadmin/tampilpkampus') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari nama pembimbing kampus..."
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
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Email</th>
                                        <th>Bidang Ilmu</th>
                                        <th>No HP</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
                                        <th>Foto</th>
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
                                                <?= $row->nip ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_lengkap ?>
                                            </td>
                                            <td>
                                                <?= $row->email ?>
                                            </td>
                                            <td>
                                                <?= $row->bidang_ilmu ?>
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
                                                <img width="20" alt="Pic" style="object-fit: cover;"
                                                    src="<?= (isset($row->foto)) ? base_url('resource/img/fotoPembimbingKampus/'.$row->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button onclick="hapus('baris<?= $no ?>', '<?= $row->nip ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <button onclick="edit('baris<?= $no ?>', '<?= $row->nip ?>')"
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

<!-- Pop up Tambah Data -->
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/tambahPkampus') ?>" method="POST">
                <div class="modal-body">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="tambah-nip">NIP</label>
                    <input type="text" id="tambah-nip" name="nip" class="form-control">
                    <label for="tambah-namaLengkap">Nama Lengkap</label>
                    <input type="text" id="tambah-namaLengkap" name="nama_lengkap" class="form-control">
                    <label for="tambah-email">Email</label>
                    <input type="text" id="tambah-email" name="email" class="form-control">
                    <label for="tambah-bidangIlmu">Bidang Ilmu</label>
                    <input type="text" id="tambah-bidangIlmu" name="bidang_ilmu" class="form-control">
                    <label for="tambah-noHP">No HP</label>
                    <input type="text" id="tambah-noHP" name="no_hp" class="form-control">
                    <label for="tambah_jenisKelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="tambah-jenisKelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="tambah-tempatLahir">Tempat Lahir</label>
                    <input type="text" id="tambah-tempatLahir" name="tempat_lahir" class="form-control">
                    <label for="tambah-tanggalLahir">Tanggal Lahir</label>
                    <input type="date" id="tambah-tanggalLahir" name="tanggal_lahir" class="form-control">
                    <label for="tambah-alamat">Alamat</label>
                    <input type="text" id="tambah-alamat" name="alamat" class="form-control">
                    <label for="tambah-agama">Agama</label>
                    <select class="form-select" name="agama" id="tambah-agama">
                                <option value="">Pilih agama</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                    </select>
                    <label for="tambah-foto">Foto</label>
                    <input type="file" id="tambah-foto" name="foto" class="form-control">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Tambah Data">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pop up hapus Data -->
<div class="modal fade" id="hapus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/hapusPkampus') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <!--<input type="hidden" id="hapus-nip" name="nip"> -->
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="hapus-nip">NIP</label>
                    <input type="text" id="hapus-nip" name="nip" class="form-control">
                    <label for="hapus-namaLengkap">Nama Lengkap</label>
                    <input type="text" id="hapus-namaLengkap" name="nama_lengkap" class="form-control">
                    <label for="hapus-email">Email</label>
                    <input type="text" id="hapus-email" name="email" class="form-control">
                    <label for="hapus-bidangIlmu">Bidang Ilmu</label>
                    <input type="text" id="hapus-bidangIlmu" name="bidang_ilmu" class="form-control">
                    <label for="hapus-noHP">No HP</label>
                    <input type="text" id="hapus-noHP" name="no_hp" class="form-control">
                    <label for="hapus_jenisKelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="hapus-jenisKelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="hapus-tempatLahir">Tempat Lahir</label>
                    <input type="text" id="hapus-tempatLahir" name="tempat_lahir" class="form-control">
                    <label for="hapus-tanggalLahir">Tanggal Lahir</label>
                    <input type="date" id="hapus-tanggalLahir" name="tanggal_lahir" class="form-control">
                    <label for="hapus-alamat">Alamat</label>
                    <input type="text" id="hapus-alamat" name="alamat" class="form-control">
                    <label for="hapus-agama">Agama</label>
                    <select class="form-select" name="agama" id="hapus-agama">
                                <option value="">Pilih agama</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                    </select>
                    <label for="hapus-foto">Foto</label>
                    <input type="file" id="hapus-foto" name="foto" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-danger" value="Hapus Data">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pop up Edit Data -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/editPkampus') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-id_industri" name="id_industri">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-nip">NIP</label>
                    <input type="text" id="edit-nip" name="nip" class="form-control">
                    <label for="edit-namaLengkap">Nama Lengkap</label>
                    <input type="text" id="edit-namaLengkap" name="nama_lengkap" class="form-control">
                    <label for="edit-email">Email</label>
                    <input type="text" id="edit-email" name="email" class="form-control">
                    <label for="edit-bidangIlmu">Bidang Ilmu</label>
                    <input type="text" id="edit-bidangIlmu" name="bidang_ilmu" class="form-control">
                    <label for="edit-noHP">No HP</label>
                    <input type="text" id="edit-noHP" name="no_hp" class="form-control">
                    <label for="edit_jenisKelamin">Jenis Kelamin</label>
                    <select class="form-select" name="jenis_kelamin" id="edit-jenisKelamin">
                            <option value="">Pilih jenis kelamin</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                    </select>
                    <label for="edit-tempatLahir">Tempat Lahir</label>
                    <input type="text" id="edit-tempatLahir" name="tempat_lahir" class="form-control">
                    <label for="edit-tanggalLahir">Tanggal Lahir</label>
                    <input type="date" id="edit-tanggalLahir" name="tanggal_lahir" class="form-control">
                    <label for="edit-alamat">Alamat</label>
                    <input type="text" id="edit-alamat" name="alamat" class="form-control">
                    <label for="edit-agama">Agama</label>
                    <select class="form-select" name="agama" id="edit-agama">
                                <option value="">Pilih agama</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Islam">Islam</option>
                                <option value="Katolik">Katolik</option>
                                <option value="Protestan">Protestan</option>
                                <option value="Budha">Budha</option>
                                <option value="Konghucu">Konghucu</option>
                    </select>
                    <label for="edit-foto">Foto</label>
                    <input type="file" id="edit-foto" name="foto" class="form-control">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-warning" value="Edit Data">
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function hapus(baris, id) {
        const td = document.querySelectorAll('#' + baris + ' td');
        // isi tiap input seuaikan nama idnya dan isi nilai
        // contoh dibawah artinya pilih input dengan attribut id hapus-nama
        // dan isi valuenya dengan kolom index ke 0 yaitu nama
        // jika kolom dengan index ke 1 artinya alamat dan seterusnya
        //  sesuai dengan urutan pada kolom tabel diatas kecuali no dan aksi tidak dihitung
        document.getElementById('hapus-nip').value = td[1].innerText
        document.getElementById('hapus-namaLengkap').value = td[2].innerText
        document.getElementById('hapus-email').value = td[3].innerText
        document.getElementById('hapus-bidangIlmu').value = td[4].innerText
        document.getElementById('hapus-noHP').value = td[5].innerText
        document.getElementById('hapus-jenisKelamin').value = td[6].innerText
        document.getElementById('hapus-tempatLahir').value = td[7].innerText
        document.getElementById('hapus-tanggalLahir').value = td[8].innerText
        document.getElementById('hapus-alamat').value = td[9].innerText
        document.getElementById('hapus-agama').value = td[10].innerText
        document.getElementById('hapus-foto').value = td[11].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-nip').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-nip').value = td[1].innerText
        document.getElementById('edit-namaLengkap').value = td[2].innerText
        document.getElementById('edit-email').value = td[3].innerText
        document.getElementById('edit-bidangIlmu').value = td[4].innerText
        document.getElementById('edit-noHP').value = td[5].innerText
        document.getElementById('edit-jenisKelamin').value = td[6].innerText
        document.getElementById('edit-tempatLahir').value = td[7].innerText
        document.getElementById('edit-tanggalLahir').value = td[8].innerText
        document.getElementById('edit-alamat').value = td[9].innerText
        document.getElementById('edit-agama').value = td[10].innerText
        document.getElementById('edit-foto').value = td[11].innerText

        document.getElementById('edit-nip').value = id;
    }
</script>