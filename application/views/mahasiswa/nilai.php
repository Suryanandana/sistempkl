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
                    <table class="table">
                        <thead>
                            <tr>
                                <th class="fw-bolder">Pengisi Nilai</th>
                                <th class="fw-bolder">Nilai Motivasi</th>
                                <th class="fw-bolder">Nilai Kreativitas</th>
                                <th class="fw-bolder">Nilai Disiplin</th>
                                <th class="fw-bolder">Nilai Pembahasan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>Pembimbing Kampus</th>
                                <td><?= ($nilai->nilai_motivasi_kampus) ? $nilai->nilai_motivasi_kampus : "Nilai Belum diinput" ?></td>
                                <td><?= ($nilai->nilai_kreativitas_kampus) ? $nilai->nilai_kreativitas_kampus : "Nilai Belum diinput" ?></td>
                                <td><?= ($nilai->nilai_disiplin_kampus) ? $nilai->nilai_disiplin_kampus : "Nilai Belum diinput" ?></td>
                                <td><?= ($nilai->nilai_pembahasan_kampus) ? $nilai->nilai_pembahasan_kampus : "Nilai Belum diinput" ?></td>
                            </tr>
                            <tr>
                                <th>Pembimbing Industri</th>
                                <td><?= ($nilai->nilai_motivasi_industri) ? $nilai->nilai_motivasi_industri : "Nilai Belum diinput"?></td>
                                <td><?= ($nilai->nilai_kreativitas_industri) ? $nilai->nilai_kreativitas_industri : "Nilai Belum diinput"?></td>
                                <td><?= ($nilai->nilai_disiplin_industri) ? $nilai->nilai_disiplin_industri : "Nilai Belum diinput"?></td>
                                <td><?= ($nilai->nilai_pembahasan_industri) ? $nilai->nilai_pembahasan_industri : "Nilai Belum diinput"?></td>
                            </tr>
                            <tr>
                                <th class="fw-bold">Nilai Total</th>
                                <th class="fw-bold"><?= ($nilai->total_nilai) ? $nilai->total_nilai : "Nilai Belum terisi semua" ?></th>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>