<div class="page-heading">
    <h3>Data Pembimbing Industri</h3>
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
                                <form action="<?= base_url('cadmin/tampilpembimbingindustri') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari nama pembimbing industri..."
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
                                        <th>Email</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jabatan</th>
                                        <th>No.HP</th>
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
                                                <?= $row->email ?>
                                            </td>
                                            <td>
                                                <?= $row->nama_lengkap ?>
                                            </td>
                                            <td>
                                                <?= $row->jabatan ?>
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
                                                <img alt="Pic" style="object-fit: cover;"
                                                    src="<?= (isset($row->foto)) ? base_url('resource/img/fotoPembimbingIndustri/' . $row->foto) : base_url('./resource/img/avatars/default.jpg'); ?>"
                                                    width="20" />
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button
                                                    onclick="hapus('baris<?= $no ?>', '<?= $row->id_pembimbing_industri ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <button
                                                    onclick="edit('baris<?= $no ?>', '<?= $row->id_pembimbing_industri ?>')"
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
            <form action="<?= base_url('cadmin/tambahpembimbingindustri') ?>" method="POST">
                <div class="modal-body">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="tambah-email">Email</label>
                    <input type="text" id="tambah-email" name="email" class="form-control">

                    <label for="tambah-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="tambah-nama_lengkap" name="nama_lengkap" class="form-control">

                    <label for="tambah-jabatan">Jabatan</label>
                    <input type="text" id="tambah-jabatan" name="jabatan" class="form-control">

                    <label for="tambah-no_hp">No.HP</label>
                    <input type="text" id="tambah-no_hp" name="no_hp" class="form-control">

                    <label for="tambah-jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="tambah-jenis_kelamin" class="form-control">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="tambah-tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="tambah-tempat_lahir" name="tempat_lahir" class="form-control">

                    <label for="tambah-tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="tambah-tanggal_lahir" name="tanggal_lahir" class="form-control">

                    <label for="tambah-alamat">Alamat</label>
                    <input type="text" id="tambah-alamat" name="alamat" class="form-control">

                    <label for="tambah-agama">Agama</label>
                    <select name="agama" id="tambah-agama" class="form-control">
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
            <form action="<?= base_url('cadmin/hapuspembimbingindustri') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="hapus-id_pembimbing_industri" name="id_pembimbing_industri">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="hapus-email">Email</label>
                    <input type="text" id="hapus-email" name="email" class="form-control">

                    <label for="hapus-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="hapus-nama_lengkap" name="nama_lengkap" class="form-control">

                    <label for="hapus-jabatan">Jabatan</label>
                    <input type="text" id="hapus-jabatan" name="jabatan" class="form-control">

                    <label for="hapus-no_hp">No.HP</label>
                    <input type="text" id="hapus-no_hp" name="no_hp" class="form-control">

                    <label for="hapus-jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="hapus-jenis_kelamin" class="form-control">
                        <option value="">Pilih jenis kelamin</option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>

                    <label for="hapus-tempat_lahir">Tempat Lahir</label>
                    <input type="text" id="hapus-tempat_lahir" name="tempat_lahir" class="form-control">

                    <label for="hapus-tanggal_lahir">Tanggal Lahir</label>
                    <input type="date" id="hapus-tanggal_lahir" name="tanggal_lahir" class="form-control">

                    <label for="hapus-alamat">Alamat</label>
                    <input type="text" id="hapus-alamat" name="alamat" class="form-control">

                    <label for="hapus-agama">Agama</label>
                    <select name="agama" id="hapus-agama" class="form-control">
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
            <form action="<?= base_url('cadmin/editpembimbingindustri') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-id_pembimbing_industri" name="id_pembimbing_industri">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-email">Email</label>
                    <input type="text" id="edit-email" name="email" class="form-control">

                    <label for="edit-nama_lengkap">Nama Lengkap</label>
                    <input type="text" id="edit-nama_lengkap" name="nama_lengkap" class="form-control">

                    <label for="edit-jabatan">Jabatan</label>
                    <input type="text" id="edit-jabatan" name="jabatan" class="form-control">

                    <label for="edit-no_hp">No.HP</label>
                    <input type="text" id="edit-no_hp" name="no_hp" class="form-control">

                    <label for="edit-jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="edit-jenis_kelamin" class="form-control">
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
                    <select name="agama" id="edit-agama" class="form-control">
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
        document.getElementById('hapus-email').value = td[0].innerText
        document.getElementById('hapus-nama_lengkap').value = td[1].innerText
        document.getElementById('hapus-jabatan').value = td[2].innerText
        document.getElementById('hapus-no_hp').value = td[3].innerText
        document.getElementById('hapus-jenis_kelamin').value = td[4].innerText
        document.getElementById('hapus-tempat_lahir').value = td[5].innerText
        document.getElementById('hapus-tanggal_lahir').value = td[6].innerText
        document.getElementById('hapus-alamat').value = td[7].innerText
        document.getElementById('hapus-agama').value = td[8].innerText
        document.getElementById('hapus-foto').value = td[9].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-id_pembimbing_industri').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-email').value = td[0].innerText
        document.getElementById('edit-nama_lengkap').value = td[1].innerText
        document.getElementById('edit-jabatan').value = td[2].innerText
        document.getElementById('edit-no_hp').value = td[3].innerText
        document.getElementById('edit-jenis_kelamin').value = td[4].innerText
        document.getElementById('edit-tempat_lahir').value = td[5].innerText
        document.getElementById('edit-tanggal_lahir').value = td[6].innerText
        document.getElementById('edit-alamat').value = td[7].innerText
        document.getElementById('edit-agama').value = td[8].innerText
        document.getElementById('edit-foto').value = td[9].innerText

        document.getElementById('edit-id_pembimbing_industri').value = id;
    }
</script>