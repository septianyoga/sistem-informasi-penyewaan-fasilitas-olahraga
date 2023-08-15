<div class="content-page">
    <div class="container-fluid">
        <h4 class="font-weight-bold">Verifikasi Fasilitas</h4>
        <div class="row">
            <div class="d-flex flex-row flex-nowrap overflow-auto" style="width: 100%;">
                <?php foreach ($fasilitas as $row) {
                    // if ($row['status'] == null) { 
                ?>
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card card-block">
                            <div class="card-body">
                                <h4 class="card-title"><?= $row['nama_fasilitas'] ?></h4>
                                <p class="card-text">Harga : <?= $row['harga'] ?> / <?= $row['hargaper'] ?> </p>
                                <p class="card-text">Alamat : <?= $row['keterangan'] ?> </p>
                                <a href="<?= base_url('admin/verifFasilitas/' . $row['id_fasilitas']) ?>" class="btn btn-sm btn-primary ">Detail</a>
                                <a href="<?= base_url('admin/verifFasilitas/verif/' . $row['id_fasilitas']) ?>" class="btn btn-success btn-sm">Verifikasi</a>
                            </div>
                        </div>
                    </div>
                <?php }
                // } 
                ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                        <div class="header-action">
                            <!-- <button class="btn btn-info">Tambah</button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="datatable-1" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                        // if ($row['status'] == 'Belum Tervalidasi') {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['nama_fasilitas'] ?></td>
                                            <td><?= $row['harga_fasilitas'] ?> / <?= $row['hargaper'] ?></td>
                                            <td><?= $row['status_fasilitas'] == 'Tervalidasi' ? '<span class="mt-2 badge badge-primary">Aktif</span>' : '<span class="mt-2 badge badge-light">Non Aktif</span>' ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/verifFasilitas/' . $row['id_fasilitas']) ?>" class="btn btn-sm btn-primary " onclick="showLoading()">Detail</a>
                                                <?php if ($row['status_fasilitas'] == 'Tervalidasi') { ?>
                                                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#non<?= $row['id_fasilitas'] ?>">Non Aktif</a>
                                                <?php } else { ?>
                                                    <a href="#" class="btn btn-info btn-sm" data-toggle="modal" data-target="#akt<?= $row['id_fasilitas'] ?>">Aktifkan</a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php
                                    } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php foreach ($data as $value) { ?>
    <div class="modal fade bd-example-modal-lg" id="non<?= $value['id_fasilitas'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Non Aktifkan Fasilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menonaktifkan Fasilitas <b><?= $value['nama_fasilitas'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/fasilitas/nonAktif/' . $value['id_fasilitas']) ?>" class="btn btn-danger">Non Aktif</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="akt<?= $value['id_fasilitas'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aktifkan Fasilitas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin mengaktifkan kembali owner <b><?= $value['nama_fasilitas'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/fasilitas/aktif/' . $value['id_fasilitas']) ?>" class="btn btn-success">Aktifkan</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>