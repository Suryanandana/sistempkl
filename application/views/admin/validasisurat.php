<div class="page-heading">
    <h3>Validasi Surat</h3>
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
                                <form action="<?= base_url('cadmin/tampilvalidasisurat') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari jenis surat..."
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
                                        <th>NIM</th>
                                        <th>Jenis Surat</th>
                                        <th>Dokumen</th>
                                        <th>Status</th>
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
                                                <?= $row->jenis_surat ?>
                                            </td>
                                            <td>
                                                <a
                                                    href="<?= base_url('resource/suratMahasiswa/' . $row->dokumen) ?>" target="__blank">Download
                                                </a>
                                            </td>
                                            <td>
                                                <?= $row->status ?>
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button
                                                    onclick="hapus('baris<?= $no ?>', '<?= $row->id_surat ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
                                                </button>
                                                <button
                                                    onclick="edit('baris<?= $no ?>', '<?= $row->id_surat ?>')"
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

<!-- Pop up hapus Data -->
<div class="modal fade" id="hapus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/hapusvalidasisurat') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="hapus-id_surat" name="id_surat">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="hapus-nim">NIM</label>
                    <input type="text" id="hapus-nim" name="nim" class="form-control">

                    <label for="hapus-jenis_surat">Jenis Surat</label>
                    <input type="text" name="jenis_surat" id="hapus-jenis_surat" class="form-control">
                    </input>

                    <label for="hapus-status">Status</label>
                    <input type="text" name="status" id="hapus-status" class="form-control" disabled>
                    </input>
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
            <form action="<?= base_url('cadmin/editvalidasisurat') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="edit-id_surat" name="id_surat">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <label for="edit-nim">NIM</label>
                    <input type="text" id="edit-nim" name="nim" class="form-control">

                    <label for="edit-jenis_surat">Jenis Surat</label>
                    <input type="text" name="jenis_surat" id="edit-jenis_surat" class="form-control" disabled>
                    </input>

                    <label for="edit-status">Status</label>
                    <select name="status" id="edit-status" class="form-control">
                        <option value="">Pilih Status</option>
                        <option value="valid">Valid</option>
                        <option value="tidak valid">Tidak Valid</option>
                        <option value="belum tervalidasi">Belum Tervalidasi</option>
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

<script>
    function hapus(baris, id) {
        const td = document.querySelectorAll('#' + baris + ' td');
        console.log(id)
        // isi tiap input seuaikan nama idnya dan isi nilai
        // contoh dibawah artinya pilih input dengan attribut id hapus-nama
        // dan isi valuenya dengan kolom index ke 0 yaitu nama
        // jika kolom dengan index ke 1 artinya alamat dan seterusnya
        //  sesuai dengan urutan pada kolom tabel diatas kecuali no dan aksi tidak dihitung
        document.getElementById('hapus-nim').value = td[1].innerText
        document.getElementById('hapus-jenis_surat').value = td[2].innerText
        document.getElementById('hapus-status').value = td[4].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-id_surat').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-nim').value = td[1].innerText
        document.getElementById('edit-jenis_surat').value = td[2].innerText
        document.getElementById('edit-status').value = td[4].innerText

        document.getElementById('edit-id_surat').value = id;
    }
</script>