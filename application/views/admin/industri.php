<div class="page-heading">
    <h3>Data Industri</h3>
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
                                <form action="<?= base_url('cadmin/tampilindustri') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari nama industri..."
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
                                        <th>Nama Industri</th>
                                        <th>Alamat Industri</th>
                                        <th>Telpon Industri</th>
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
                                                <?= $row->nama ?>
                                            </td>
                                            <td>
                                                <?= $row->alamat ?>
                                            </td>
                                            <td>
                                                <?= $row->telp ?>
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button onclick="hapus('baris<?= $no ?>', '<?= $row->id_industri ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <button onclick="edit('baris<?= $no ?>', '<?= $row->id_industri ?>')"
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
            <form action="<?= base_url('cadmin/tambahindustri') ?>" method="POST">
                <div class="modal-body">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="tambah-nama">Nama Industri</label>
                    <input type="text" id="tambah-nama" name="nama" class="form-control">
                    <label for="tambah-alamat">Alamat Industri</label>
                    <input type="text" id="tambah-alamat" name="alamat" class="form-control">
                    <label for="tambah-telp">Telpon Industri</label>
                    <input type="text" id="tambah-telp" name="telp" class="form-control">
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
            <form action="<?= base_url('cadmin/hapusindustri') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="hapus-id_industri" name="id_industri">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="hapus-nama">Nama Industri</label>
                    <input type="text" id="hapus-nama" name="nama" class="form-control">
                    <label for="hapus-alamat">Alamat Industri</label>
                    <input type="text" id="hapus-alamat" name="alamat" class="form-control">
                    <label for="hapus-telp">Telpon Industri</label>
                    <input type="text" id="hapus-telp" name="telp" class="form-control">
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
            <form action="<?= base_url('cadmin/editindustri') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-id_industri" name="id_industri">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-nama">Nama Industri</label>
                    <input type="text" id="edit-nama" name="nama" class="form-control">
                    <label for="edit-alamat">Alamat Industri</label>
                    <input type="text" id="edit-alamat" name="alamat" class="form-control">
                    <label for="edit-telp">Telpon Industri</label>
                    <input type="text" id="edit-telp" name="telp" class="form-control">
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
        document.getElementById('hapus-nama').value = td[0].innerText
        document.getElementById('hapus-alamat').value = td[1].innerText
        document.getElementById('hapus-telp').value = td[2].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-id_industri').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-nama').value = td[0].innerText
        document.getElementById('edit-alamat').value = td[1].innerText
        document.getElementById('edit-telp').value = td[2].innerText

        document.getElementById('edit-id_industri').value = id;
    }
</script>