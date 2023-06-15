<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-row flex-nowrap overflow-auto" style="width: 100%;">
                <?php
                $no = 1;
                foreach ($data as $row) {
                    if ($row['status_pesanan'] != 'Diapprov' && $row['date_expired'] > date('Y-m-d H:i:s')) {
                        if ($row['status_pesanan'] != 'Ditolak') {
                ?>
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card card-block">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <h4 class="card-title">Pesanan <?= $no++; ?></h4>
                                            <?php if ($row['status_pesanan'] == 'Dibayar') { ?>
                                                <small class="text-danger mt-2">(Menunggu Persetujuan)</small>
                                            <?php } elseif ($row['status_pesanan'] == 'Belum Dibayar' || $row['status_pesanan'] == null) { ?>
                                                <small class="text-danger mt-2">(Menunggu Pembayaran)</small>
                                            <?php } ?>
                                        </div>
                                        <p>Nama Penyewa : <?= $row['nama_penyewa'] ?></p>
                                        <p>Nama Fasilitas : <?= $row['nama_fasilitas'] ?></p>
                                        <p><?= $row['hargaper'] ?> Pemesanan : <?= $row['tanggal'] ?></p>
                                        <a href="<?= base_url('owner/pesanan/' . $row['id_pesanan']) ?>" class="btn btn-sm btn-primary ">Detail</a>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                }
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
                    </div>
                    <div class="card-body">
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger" role="alert">
                                <ul>
                                    <?php foreach ($errors as $key => $value) { ?>
                                        <li><?= esc($value); ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php  } ?>
                        <div class="table-responsive">
                            <table id="datatable-1" class="table data-table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Penyewa</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                        <th>Tanggal</th>
                                        <th class="text-center">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                        if ($row['status_pesanan'] != 'Belum Dibayar') {
                                    ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td><?= $row['nama_penyewa'] ?></td>
                                                <td><?= $row['nama_fasilitas'] ?></td>
                                                <td><?= $row['harga'] ?></td>
                                                <td>
                                                    <?php if (date('Y-m-d') > $row['tanggal'] && $row['status_pesanan'] == 'Diapprov') { ?>
                                                        <span class="mt-2 badge badge-primary">Selesai</span>
                                                    <?php } elseif ($row['status_pesanan'] == 'Ditolak') { ?>
                                                        <span class="mt-2 badge badge-light">Ditolak</span>
                                                    <?php } elseif (date('Y-m-d') <= $row['tanggal'] && $row['status_pesanan'] != 'Belum Dibayar') { ?>
                                                        <span class="mt-2 badge badge-info">Progress</span>
                                                    <?php } else { ?>
                                                        <span class="mt-2 badge badge-dark">Expired</span>
                                                    <?php } ?>
                                                </td>
                                                <td><?= $row['tanggal'] ?></td>
                                                <td>
                                                    <a href="<?= base_url('owner/pesanan/' . $row['id_pesanan']) ?>" class="btn btn-primary btn-sm">Detail</a>
                                                </td>
                                            </tr>
                                    <?php
                                        }
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