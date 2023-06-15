<div class="content-page">
    <div class="container-fluid">
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
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Status</th>
                                        <th class="text-center">Foto</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++ ?>.</td>
                                            <td><?= $row['nama_penyewa'] ?></td>
                                            <td><?= $row['username'] ?></td>
                                            <td><?= $row['email'] ?></td>
                                            <td><?= $row['status_aktif'] == 'Aktif' ? '<span class="mt-2 badge badge-primary">Aktif</span>' : '<span class="mt-2 badge badge-light">Non Aktif</span>' ?></td>
                                            <td class="text-center"><img width="75px" src="<?= ($row['foto'] == null) ? base_url('asset/img/user.png') : base_url('foto_profil/' . $row['foto']) ?> " alt=""></td>
                                            <td class="text-center">
                                                <a href="#" class="btn btn-primary btn-sm">Detail</a>
                                                <?php if ($row['status_aktif'] == 'Aktif') { ?>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $row['id_penyewa'] ?>">Non Aktif</button>
                                                <?php } else { ?>
                                                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#akt<?= $row['id_penyewa'] ?>">Akktifan</button>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
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
    <div class="modal fade bd-example-modal-lg" id="delete<?= $row['id_penyewa'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">NOn Aktifkan Penyewa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin menonaktifkan penyewa <b><?= $row['nama_penyewa'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/penyewa/' . $row['id_penyewa']) ?>" class="btn btn-danger">Non Aktif</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="akt<?= $row['id_penyewa'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Aktifkan Kembali Penyewa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Yakin ingin kembali mengaktifkan penyewa <b><?= $row['nama_penyewa'] ?>?</b></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/penyewa/aktif/' . $row['id_penyewa']) ?>" class="btn btn-success">Aktifkan</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>