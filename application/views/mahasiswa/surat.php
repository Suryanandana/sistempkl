<?php $data = $data[0]; // ambil data dari index ke 0 ?>
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
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw-bolder">Jenis Surat</th>
                                <th class="fw-bolder">Download Surat</th>
                                <th class="fw-bolder">Upload Surat</th>
                                <th class="fw-bolder">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Surat Pengajuan PKL</th>
                                <td>
                                    <?php if (isset($dataSurat[0]->dokumen)): ?>
                                        <a
                                            href="<?= base_url('cmahasiswa/downloadDataSurat?file=' . $dataSurat[0]->dokumen) ?>">Download</a>
                                    <?php else: ?>
                                        <span>Surat belum bisa didownload</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($surat[0]->dokumen)): ?>
                                        <a
                                            href="<?= base_url('cmahasiswa/downloadSurat?file=' . $surat[0]->dokumen) ?>">Download</a>
                                    <?php else: ?>
                                        <span>Belum upload surat</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($surat[0]->status)): ?>
                                        <span>
                                            <?= $surat[0]->status ?>
                                        </span>
                                    <?php else: ?>
                                        <span>Belum upload surat</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Surat Pengantar PKL</th>
                                <td>
                                    <?php if (isset($dataSurat[1]->dokumen)): ?>
                                        <a
                                            href="<?= base_url('cmahasiswa/downloadDataSurat?file=' . $dataSurat[1]->dokumen) ?>">Download</a>
                                    <?php else: ?>
                                        <span>Surat Belum Bisa Didownload</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($surat[1]->dokumen)): ?>
                                        <a
                                            href="<?= base_url('cmahasiswa/downloadSurat?file=' . $surat[1]->dokumen) ?>">Download</a>
                                    <?php else: ?>
                                        <span>Surat Belum Bisa Didownload</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if (isset($surat[1]->status)): ?>
                                        <span>
                                            <?= $surat[1]->status ?>
                                        </span>
                                    <?php else: ?>
                                        <span>Belum upload surat</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="w-100 mb-10 bg-white p-10">
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw-bolder">Jenis Surat</th>
                                <th class="fw-bolder"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Surat Resmi PKL</th>
                                <td>Jacob</td>
                            </tr>
                            <tr>
                                <th>Surat Bimbingan PKL</th>
                                <td>Jacob</td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed p-6">
                        <span class="svg-icon svg-icon-2tx svg-icon-warning me-4">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewBox="0 0 24 24"
                                version="1.1">
                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10" />
                                <rect fill="#000000" x="11" y="7" width="2" height="8" rx="1" />
                                <rect fill="#000000" x="11" y="16" width="2" height="2" rx="1" />
                            </svg>
                        </span>
                        <div class="d-flex flex-stack flex-grow-1">
                            <div class="fw-bold">
                                <h4 class="text-gray-800 fw-bolder">Perhatian!</h4>
                                <div class="fs-6 text-gray-600">Surat resmi dan bimbingan dapat didownload ketika surat
                                    yang diupload sudah lengkap dan valid
                                </div>
                            </div>
                        </div>
                    </div>
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
                                <option value="surat pengantar">Surat Resmi PKL</option>
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