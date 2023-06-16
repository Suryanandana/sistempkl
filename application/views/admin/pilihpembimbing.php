<div class="page-heading">
    <h3>Pemilihan Pembimbing</h3>
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
                        <?php if ($this->session->flashdata('pesan_gagal')): ?>
                            <div class="alert alert-danger" role="alert">
                                <?= $this->session->flashdata('pesan_gagal'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-end">
                            <div class="col-4">
                                <!-- fitur pencarian (cukup ubah link actionnya aja) -->
                                <form action="<?= base_url('cadmin/tampilpilihpembimbing') ?>" method="get">
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
                                    <th>NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <th>NIP</th>
                                    <th>Nama Pembimbing Kampus</th>
                                    <th>Nama Pembimbing Industri</th>
                                    <th>Industri</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $row): ?>
                                    <tr id="baris<?= $row->id_pembimbing_mahasiswa ?>">
                                        <td scope="row"><?= $no ?></td>
                                        <td><?= $row->nim ?></td>
                                        <td><?= $row->nama_lengkap ?></td>
                                        <td><?= $row->nip ?></td>
                                        <td><?= $row->nama_lengkap_kampus ?></td>
                                        <td><?= $row->nama_lengkap_industri ?></td>
                                        <td><?= $row->nama ?></td>
                                        <td>
                                            <button onclick="hapus('baris<?= $row->id_pembimbing_mahasiswa ?>', '<?= $row->id_pembimbing_mahasiswa ?>')"
                                                    class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapus-modal">
                                                <i class="bi bi-trash3"></i>
                                            </button>
                                        </td>
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
            <form action="<?= base_url('cadmin/tambahPmahasiswa') ?>" method="POST">
                <div class="modal-body">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <input type="hidden" id="tambah-id_pembimbing_mahasiswa" name="id_pembimbing_mahasiswa">
                    <label for="tambah-nim">Data Diri Mahasiswa</label>
                    <select class="form-select" name="nim" id="tambah-nim">
                        <option value="">Pilih Data Diri Mahasiswa</option>
                        <?php foreach ($listNIM as $row): ?>
                            <option value="<?= $row->nim ?>"><?= $row->nim .' | '. $row->nama_lengkap ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="tambah-nip">Data Diri Pembimbing Kampus</label>
                    <select class="form-select" name="nip" id="tambah-nip">
                        <option value="">Pilih Data Diri Pembimbing Kampus</option>
                        <?php foreach ($listNIP as $row): ?>
                            <option value="<?= $row->nip ?>"><?= $row->nip .' | '. $row->nama_lengkap ?></option>
                        <?php endforeach; ?>
                    </select>
                    <label for="tambah-namaLengkapPI">Data Diri Pembimbing Industri</label>
                    <select class="form-select" name="id_pembimbing_industri" id="tambah-id_pembimbing_industri">
                        <option value="">Pilih Data Diri Pembimbing Industri</option>
                        <?php foreach ($listIdPindustri as $row): ?>
                            <option value="<?= $row->id_pembimbing_industri ?>"><?= $row->nama_lengkap .' | '. $row->email ?></option>
                        <?php endforeach; ?>
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

<!-- Pop up hapus Data -->
<div class="modal fade" id="hapus-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Hapus Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/hapusPmahasiswa') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <!--<input type="hidden" id="hapus-nip" name="nip"> -->
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <input type="hidden" id="hapus-id_pembimbing_mahasiswa" name="id_pembimbing_mahasiswa">
                    <label for="hapus-nim">NIM</label>
                    <input type="text" id="hapus-nim" name="nim" class="form-control">
                    <label for="hapus-namaLengkapM">Nama Lengkap Mahasiswa</label>
                    <input type="text" id="hapus-namaLengkapM" name="nama_lengkap" class="form-control">
                    <label for="hapus-nip">NIP</label>
                    <input type="text" id="hapus-nip" name="nip" class="form-control">
                    <label for="hapus-namaLengkapPK">Nama Lengkap Pembimbing Kampus</label>
                    <input type="text" id="hapus-namaLengkapPK" name="nama_lengkap" class="form-control">
                    <label for="hapus-namaLengkapPI">Nama Lengkap Pembimbing Industri</label>
                    <input type="text" id="hapus-namaLengkapPI" name="nama_lengkap" class="form-control">
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
        document.getElementById('hapus-nim').value = td[1].innerText
        document.getElementById('hapus-namaLengkapM').value = td[2].innerText
        document.getElementById('hapus-nip').value = td[3].innerText
        document.getElementById('hapus-namaLengkapPK').value = td[4].innerText
        document.getElementById('hapus-namaLengkapPI').value = td[5].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-id_pembimbing_mahasiswa').value = id;
    }
</script>