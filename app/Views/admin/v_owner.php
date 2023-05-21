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
                                        <th>Alamat</th>
                                        <th>No Telp</th>
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
                                                <td><?= $row['username'] ?></td>
                                                <td><?= $row['email'] ?></td>
                                                <td><?= $row['alamat'] ?></td>
                                                <td><?= $row['no_telp'] ?></td>
                                                <td class="text-center">
                                                    <a href="<?= base_url() ?>" class="btn btn-primary btn-sm mb-1">Detail</a>
                                                    <button class="btn btn-sm btn-danger" data-toggle="modal" data-target="#delete<?= $row['id_owner'] ?>">Hapus</button>
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

<!-- modal edit -->
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
                    <p>Yakin ingin menghapus data owner <b><?= $row['nama_penyewa'] ?>?</b></p>
                    <p>Semua data fasilitas akan ikut terhapus.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('admin/owner/' . $row['id_owner']) ?>" class="btn btn-danger">Hapus</a>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>