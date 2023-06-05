<div class="page-heading">
    <h3>Data Master Mahasiswa</h3>
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
                        <div class="table-responsive" id="chart-profile-visit">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Surat</th>
                                        <th>Jenis Surat</th>
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
                                                <?= $row->dokumen ?>
                                            </td>
                                            <td>
                                                <?= $row->jenis_surat ?>
                                            </td>
                                            <th>
                                                <!-- untuk argumen ke2 pada function hapus&edit sesuaikan dengan primary key tabel -->
                                                <!-- contohnya jika tabel mahasiswa maka isi $row->nim -->
                                                <button
                                                    onclick=""
                                                    class="btn btn-warning" data-bs-toggle="modal"
                                                    data-bs-target="#l">
                                                    <i class="bi bi-file-earmark-arrow-down"></i>
                                                </button>
                                                <button
                                                    onclick="hapus('baris<?= $no ?>', '<?= $row->jenis_surat ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#hapus-modal">
                                                    <i class="bi bi-trash3"></i>
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
    </section>
</div>

<!-- Pop up Tambah Data -->
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/tambahSurat') ?>" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="dokumen">Upload Surat</label>
                            <input type="file" id="dokumen" name="dokumen" class="form-control">
                        </div>
                        <div class="col-6">
                            <label for="jenis_surat">Jenis Surat</label>
                            <select class="form-select" aria-label="Default select example" name="jenis_surat">
                                <option selected>Pilih</option>
                                <option value="surat pengajuan">Surat Pengajuan</option>
                                <option value="surat pengantar">Surat Pengantar</option>
                                <option value="surat resmi pkl">Surat Resmi PKL</option>
                                <option value="surat bimbingan">Surat Bimbingan</option>
                            </select>
                        </div>
                    </div>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Hapus Data?</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/hapusSurat') ?>" method="post">
                <div class="modal-body">
                    <input type="hidden" id="jenis_surat" name="jenis_surat">
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="hapus-dokumen">Nama Surat</label>
                            <input type="text" id="hapus-dokumen" name="dokumen" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="hapus-jenis_surat">Jenis</label>
                            <input type="text" id="hapus-jenis_surat" name="jenis_surat" class="form-control" disabled>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-danger" value="Hapus Data">
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
        document.getElementById('hapus-dokumen').value = td[1].innerText
        document.getElementById('hapus-jenis_surat').value = td[2].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('jenis_surat').value = id;
    }
</script>