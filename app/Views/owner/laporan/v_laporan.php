<div class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title"><?= $title ?></h4>
                        </div>
                        <button class="btn btn-primary text-end print" onclick="window.print()">Cetak</button>
                        <style>
                            @media print {
                                .print {
                                    display: none;
                                }
                            }
                        </style>
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
                                        <th class="text-center print">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($data as $row) {
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row['nama_penyewa'] ?></td>
                                            <td><?= $row['nama_fasilitas'] ?></td>
                                            <td><?= $row['harga'] ?></td>
                                            <td>
                                                <?php if ($row['status_pesanan'] == 'Belum Dibayar' && date('Y-m-d H:i:s') > $row['date_expired']) { ?>
                                                    <span class="mt-2 badge badge-danger">Expired</span>
                                                <?php } elseif ($row['status_pesanan'] == 'Belum Dibayar' && date('Y-m-d H:i:s') <= $row['tanggal']) { ?>
                                                    <span class="mt-2 badge badge-info">Menunggu Pembayaran</span>
                                                <?php } elseif ($row['status_pesanan'] == 'Diapprov' && date('Y-m-d H:i:s' > $row['tanggal'])) { ?>
                                                    <span class="mt-2 badge badge-success">Selesai</span>
                                                <?php } elseif ($row['status_pesanan'] == 'Dibayar') { ?>
                                                    <span class="mt-2 badge badge-warning">Menunggu Disetujui</span>
                                                <?php } elseif ($row['status_pesanan'] == 'Diapprov') { ?>
                                                    <span class="mt-2 badge badge-primary">Disejutui</span>
                                                <?php } elseif ($row['status_pesanan'] == 'Ditolak') { ?>
                                                    <span class="mt-2 badge badge-secondary">Ditolak</span>
                                                <?php } ?>
                                            </td>
                                            <td><?= $row['tanggal'] ?></td>
                                            <td class="print">
                                                <a href="<?= base_url('owner/pesanan/' . $row['id_pesanan']) ?>" class="btn btn-primary btn-sm">Detail</a>
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