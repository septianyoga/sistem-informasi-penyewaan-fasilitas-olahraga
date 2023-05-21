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
                                            <td class="text-center"><img width="75px" src="<?= ($row['foto'] == null) ? base_url('asset/img/user.png') : base_url('foto_profil/' . $row['foto']) ?> " alt=""></td>
                                            <td class="text-center">
                                                <a href="<?= base_url() ?>" class="btn btn-primary btn-sm">Detail</a>
                                                <button class="btn btn-sm btn-danger">Hapus</button>
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