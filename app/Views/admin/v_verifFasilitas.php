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
                                        <th>Nama Fasilitas</th>
                                        <th>Keterangan</th>
                                        <th>Harga</th>
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
                                            <td><?= $row['keterangan'] ?></td>
                                            <td><?= $row['harga'] ?> / <?= $row['hargaper'] ?></td>
                                            <td class="text-center">
                                                <a href="<?= base_url('admin/verifFasilitas/' . $row['id_fasilitas']) ?>" class="btn btn-sm btn-primary ">Detail</a>
                                                <a href="<?= base_url('admin/verifFasilitas/verif/' . $row['id_fasilitas']) ?>" class="btn btn-success btn-sm">Verifikasi</a>
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