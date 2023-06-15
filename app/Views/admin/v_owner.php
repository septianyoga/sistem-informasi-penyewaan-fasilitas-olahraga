<div class="content-page">
    <div class="container-fluid">
        <h4 class="font-weight-bold">Verifikasi Owner</h4>
        <div class="row">
            <div class="d-flex flex-row flex-nowrap overflow-auto" style="width: 100%;">
                <?php foreach ($data as $row) {
                    if ($row['status'] == null) { ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card card-block">
                                <div class="card-body">
                                    <h4 class="card-title"><?= $row['nama_penyewa'] ?></h4>
                                    <p class="card-text">Email : <?= $row['email'] ?> </p>
                                    <p class="card-text">No Telp : <a target="_blank" href="https://wa.me/62<?= $row['no_telp'] ?>"><?= $row['no_telp'] ?></a> </p>
                                    <p class="card-text">Alamat : <?= $row['alamat'] ?> </p>
                                    <a href="<?= base_url('admin/verifOwner/' . $row['id_owner']) ?>" class="btn btn-success btn-sm">Verifikasi</a>
                                </div>
                            </div>
                        </div>
                <?php }
                } ?>
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
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>No Telp</th>
                                        <th>Status</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                        if ($row['status'] != null) {
                                    ?>
                                            <tr>
                                                <td><?= $no++ ?>.</td>
                                                <td><?= $row['nama_penyewa'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['no_telp'] ?></td>
                                                <td><?= $row['status'] != 'Non Aktif' ? '<span class="mt-2 badge badge-primary">Aktif</span>' : '<span class="mt-2 badge badge-light">Non Aktif</span>' ?></td>
                                                <td class="text-center">
                                                    <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#detail<?= $row['id_owner'] ?>">Detail</a>
                                                    <?php if ($row['status'] != 'Non Aktif') { ?>
                                                        <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $row['id_owner'] ?>">Non Aktif</button>
                                                    <?php } else { ?>
                                                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#aktif<?= $row['id_owner'] ?>">Aktifkan</button>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                    <?php }
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

<!-- modal hapus -->
<?php foreach ($data as $row) { ?>
    <div class="modal fade bd-example-modal-lg" id="delete<?= $row['id_owner'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Owner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menonaktifkan owner <b><?= $row['nama_penyewa'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/owner/nonAktif/' . $row['id_owner']) ?>" class="btn btn-danger">Non Aktif</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- aktif -->
    <div class="modal fade bd-example-modal-lg" id="aktif<?= $row['id_owner'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aktifkan Owner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin mengaktifkan kembali owner <b><?= $row['nama_penyewa'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/owner/aktif/' . $row['id_owner']) ?>" class="btn btn-success">Aktifkan</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <!-- detail Owner -->
    <div class="modal fade bd-example-modal-lg" id="detail<?= $row['id_owner'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Owner</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Nama : <b><?= $row['nama_penyewa'] ?></b></p>
                    <p>Username : <b><?= $row['username'] ?></b></p>
                    <p>Email : <b><?= $row['email'] ?></b></p>
                    <p>Alamat : <b><?= $row['alamat'] ?></b></p>
                    <p>No Telp : <b><?= $row['no_telp'] ?></b></p>
                    <p>Status : <?= $row['status'] ?></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>