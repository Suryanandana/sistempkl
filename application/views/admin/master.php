<div class="page-heading">
    <h3>Data Master Mahasiswa</h3>
</div>
<button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambah-modal">
    Tambah Data
</button>
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#import-modal">
    Import Excel
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
                                <form action="<?= base_url('cadmin/tampilmaster') ?>" method="get">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1">
                                            <i class="bi bi-search"></i>
                                        </span>
                                        <input type="text" name="cari" class="form-control"
                                            placeholder="Cari nama mahasiswa..."
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
                                        <th>Nama Lengkap</th>
                                        <th>Jurusan</th>
                                        <th>Prodi</th>
                                        <th>Tahun Masuk</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Agama</th>
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
                                                <?= $row->jurusan ?>
                                            </td>
                                            <td>
                                                <?= $row->prodi ?>
                                            </td>
                                            <td>
                                                <?= $row->tahun_masuk ?>
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

<!-- Pop up Tambah Data -->
<div class="modal fade" id="tambah-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Tambah Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/tambahmaster') ?>" method="POST">
                <div class="modal-body">
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="nim">NIM</label>
                            <input type="text" id="nim" name="nim" class="form-control">
                        </div>
                        <div class="col">
                            <label for="nama">Nama Lengkap</label>
                            <input type="text" id="nama" name="nama_lengkap" class="form-control">
                        </div>
                        <div class="col"><label for="jurusan">Jurusan</label>
                            <input type="text" id="jurusan" name="jurusan" class="form-control">
                        </div>
                        <div class="col"><label for="prodi">Prodi</label>
                            <input type="text" id="prodi" name="prodi" class="form-control">
                        </div>
                        <div class="col"><label for="tahun">Tahun Masuk</label>
                            <input type="text" id="tahun" name="tahun_masuk" class="form-control">
                        </div>
                        <div class="col"><label for="jenkel">Jenis Kelamin</label>
                            <input type="text" id="jenkel" name="jenis_kelamin" class="form-control">
                        </div>
                        <div class="col"><label for="tempat">Tempat Lahir</label>
                            <input type="text" id="tempat" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="col"><label for="tanggal">Tanggal Lahir</label>
                            <input type="date" id="tanggal" name="tanggal_lahir" class="form-control">
                        </div>
                        <div class="col">
                            <label for="alamat">Alamat</label>
                            <input type="text" id="alamat" name="alamat" class="form-control">
                        </div>
                        <div class="col">
                            <label for="agama">Agama</label>
                            <input type="text" id="agama" name="agama" class="form-control">
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
            <form action="<?= base_url('cadmin/hapusmaster') ?>" method="post">
                <div class="modal-body">
                    <!-- sesuaikan name dengan primary key pada tabel -->
                    <input type="hidden" id="hapus-id-nim" name="nim">
                    <!-- attribut for dan id harus sama sedangkan name harus sama dengan kolom pada db -->
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="hapus-nim">NIM</label>
                            <input type="text" id="hapus-nim" name="id-nim" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="hapus-nama">Nama Lengkap</label>
                            <input type="text" id="hapus-nama" name="nama_lengkap" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-jurusan">Jurusan</label>
                            <input type="text" id="hapus-jurusan" name="jurusan" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-prodi">Prodi</label>
                            <input type="text" id="hapus-prodi" name="prodi" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-tahun">Tahun Masuk</label>
                            <input type="text" id="hapus-tahun" name="tahun_masuk" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-jenkel">Jenis Kelamin</label>
                            <input type="text" id="hapus-jenkel" name="jenis_kelamin" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-tempat">Tempat Lahir</label>
                            <input type="text" id="hapus-tempat" name="tempat_lahir" class="form-control" disabled>
                        </div>
                        <div class="col"><label for="hapus-tanggal">Tanggal Lahir</label>
                            <input type="text" id="hapus-tanggal" name="tanggal_lahir" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="hapus-alamat">Alamat</label>
                            <input type="text" id="hapus-alamat" name="alamat" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="hapus-agama">Agama</label>
                            <input type="text" id="hapus-agama" name="agama" class="form-control" disabled>
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

<!-- Pop up Edit Data -->
<div class="modal fade" id="edit-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Edit Data</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/editmaster') ?>" method="post">
                <input type="hidden" id="edit-id-nim" name="nim">
                <div class="modal-body">
                    <div class="row row-cols-2">
                        <div class="col">
                            <label for="edit-nim">NIM</label>
                            <input type="text" id="edit-nim" name="id-nim" class="form-control" disabled>
                        </div>
                        <div class="col">
                            <label for="edit-nama">Nama Lengkap</label>
                            <input type="text" id="edit-nama" name="nama_lengkap" class="form-control">
                        </div>
                        <div class="col"><label for="edit-jurusan">Jurusan</label>
                            <input type="text" id="edit-jurusan" name="jurusan" class="form-control">
                        </div>
                        <div class="col"><label for="edit-prodi">Prodi</label>
                            <input type="text" id="edit-prodi" name="prodi" class="form-control">
                        </div>
                        <div class="col"><label for="edit-tahun">Tahun Masuk</label>
                            <input type="text" id="edit-tahun" name="tahun_masuk" class="form-control">
                        </div>
                        <div class="col"><label for="edit-jenkel">Jenis Kelamin</label>
                            <input type="text" id="edit-jenkel" name="jenis_kelamin" class="form-control">
                        </div>
                        <div class="col"><label for="edit-tempat">Tempat Lahir</label>
                            <input type="text" id="edit-tempat" name="tempat_lahir" class="form-control">
                        </div>
                        <div class="col"><label for="edit-tanggal">Tanggal Lahir</label>
                            <input type="text" id="edit-tanggal" name="tanggal_lahir" class="form-control">
                        </div>
                        <div class="col">
                            <label for="edit-alamat">Alamat</label>
                            <input type="text" id="edit-alamat" name="alamat" class="form-control">
                        </div>
                        <div class="col">
                            <label for="edit-agama">Agama</label>
                            <input type="text" id="edit-agama" name="agama" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-warning" value="Edit Data">
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Pop up Import Data -->
<div class="modal fade" id="import-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white" id="exampleModalLabel">Import Data Excel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('cadmin/uploaddata') ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <label for="edit-telp">File Excel</label>
                    <input type="file" id="edit-telp" name="import" class="form-control">
                    <div id="emailHelp" class="form-text">Format excel harus dalamat .xls atau .xlsx</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-success" value="Import Data">
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
        document.getElementById('hapus-nama').value = td[2].innerText
        document.getElementById('hapus-jurusan').value = td[3].innerText
        document.getElementById('hapus-prodi').value = td[4].innerText
        document.getElementById('hapus-tahun').value = td[5].innerText
        document.getElementById('hapus-jenkel').value = td[6].innerText
        document.getElementById('hapus-tempat').value = td[7].innerText
        document.getElementById('hapus-tanggal').value = td[8].innerText
        document.getElementById('hapus-alamat').value = td[9].innerText
        document.getElementById('hapus-agama').value = td[10].innerText
        // isi input id_industri dengan parameter id untuk menghapus baris
        document.getElementById('hapus-id-nim').value = id;
    }

    function edit(baris, id) {
        // fungsinya sama seperti hapus hanya beda penamaan
        const td = document.querySelectorAll('#' + baris + ' td');

        document.getElementById('edit-nim').value = td[1].innerText
        document.getElementById('edit-nama').value = td[2].innerText
        document.getElementById('edit-jurusan').value = td[3].innerText
        document.getElementById('edit-prodi').value = td[4].innerText
        document.getElementById('edit-tahun').value = td[5].innerText
        document.getElementById('edit-jenkel').value = td[6].innerText
        document.getElementById('edit-tempat').value = td[7].innerText
        document.getElementById('edit-tanggal').value = td[8].innerText
        document.getElementById('edit-alamat').value = td[9].innerText
        document.getElementById('edit-agama').value = td[10].innerText

        document.getElementById('edit-id-nim').value = id;
    }
</script>