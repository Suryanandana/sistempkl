<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
    <div id="kt_header" class="header" data-kt-sticky="true" data-kt-sticky-name="header"
        data-kt-sticky-offset="{default: '200px', lg: '300px'}">
        <div class="container-fluid d-flex align-items-stretch justify-content-between" id="kt_header_container">
            <div class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 mb-5 mb-lg-0"
                data-kt-swapper="true" data-kt-swapper-mode="prepend"
                data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
                <h1 class="text-dark fw-bolder mt-1 mb-1 fs-2"></h1>
                <ul class="breadcrumb fw-bold fs-base mb-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="index.html" class="text-muted text-hover-primary">Home</a>
                    </li>
                    <li class="breadcrumb-item text-muted">Account</li>
                    <li class="breadcrumb-item text-dark">Surat</li>
                </ul>
            </div>
            <div class="d-flex align-items-stretch flex-shrink-0">
                <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                    <div class="cursor-pointer symbol symbol-circle symbol-30px symbol-md-40px"
                        data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end"
                        data-kt-menu-flip="bottom">
                        <img alt="Pic" style="object-fit: cover;"
                            src="<?= (isset($data->foto)) ? base_url('resource/img/fotoMahasiswa/' . $data->foto) : base_url('./resource/img/avatars/default.jpg'); ?>" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content d-flex flex-column flex-column-fluid fs-6" id="kt_content">
        <div class="container" id="kt_content_container">
            <div class="d-flex flex-column">
                <div class="w-100 mb-10 bg-white p-10">
                    <button class="btn btn-primary mb-8" data-bs-toggle="modal" data-bs-target="#kt_modal_1">
                        Upload Surat</button>
                    <table id="datatable" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama aktivitas</th>
                                <th>Deskripsi aktivitas</th>
                                <th>Dokumen</th>
                                <th>Validasi kampus</th>
                                <th>Validasi industri</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($data as $row): ?>
                                <tr>
                                    <td>
                                        <?= $no++; ?>
                                    </td>
                                    <td>
                                        <?= $row->nama_aktivitas ?>
                                    </td>
                                    <td>
                                        <?= $row->deskripsi_aktivitas ?>
                                    </td>
                                    <td>
                                        <?php if (isset($row->dokumen)): ?>
                                            <a
                                                href="<?= base_url('cmahasiswa/downloadSuratPKL?file=' . $row->dokumen) ?>">Download</a>
                                        <?php else: ?>
                                            <span>Blum upload surat</span>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <?= $row->validasi_kampus ?>
                                    </td>
                                    <td>
                                        <?= $row->validasi_industri ?>
                                    </td>
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- pop up form -->
<div class="modal fade" tabindex="-1" id="kt_modal_1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white">Form Upload Surat</h5>
                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <span class="svg-icon svg-icon-2x"></span>
                </div>
                <!--end::Close-->
            </div>

            <form action="<?= base_url('cmahasiswa/uploadsurat'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mt-4">
                        <input type="hidden" name="nim" value="<?= $data->nim; ?>">
                        <div class="col-6">
                            <label>Upload Surat</label>
                            <input type="file" class="form-control" name="dokumen" />
                        </div>
                        <div class="col-6">
                            <label>Jenis Surat</label>
                            <select name="jenis_surat" class="form-select">
                                <option value="surat pengajuan">Surat Pengajuan</option>
                                <option value="surat pengantar">Surat Pengantar</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <input type="submit" class="btn btn-primary" value="Simpan Data">
                </div>
            </form>
        </div>
    </div>
</div>