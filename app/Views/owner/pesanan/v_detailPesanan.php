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
                            <a href="<?= base_url('owner/pesanan') ?>" class="btn"><i class="bi bi-arrow-return-left"></i> Kembali</a>
                            <!-- <button class="btn btn-info">Tambah</button> -->
                        </div>
                    </div>
                    <hr style="margin-top: -15px;">
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
                        <div class="row">
                            <div class="col-12 col-md-12 col-lg-6">
                                <h5 class="mb-2">Nama Penyewa : <?= $data['nama_penyewa'] ?></h5>
                                <p>Email : <?= $data['email'] ?></p>
                                <p>Fasilitas yang disewakan : <?= $data['nama_fasilitas'] ?></p>
                                <h6 class="mt-2">Waktu Penyewaan : <?= date('d F Y H:i', strtotime($data['tanggal'])) ?></h6>
                                <h5 class="mt-2">Total Harga : Rp<?= number_format($data['nominal'], 0, ",", ".") ?></h5>
                                <?php if ($data['status_pesanan'] == 'Dibayar') { ?>
                                    <button class="btn btn-primary btn-sm m-3" data-toggle="modal" data-target="#exampleModalCenter">Approv</button>
                                    <button class="btn btn-danger btn-sm m-3" data-toggle="modal" data-target="#tolak">Tolak</button>
                                <?php } elseif ($data['status_pesanan'] == 'Belum Dibayar') { ?>
                                    <h5 class="mt-3">Status : <span class="hijau">Menunggu Pembayaran</span></h5>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-md-12 col-lg-6">
                                <h5>Bukti Pembayaran : </h5>
                                <img class="w-100" src="<?= base_url('bukti_pembayaran/' . $data['bukti_pembayaran']) ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- modal approv -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Approv Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin mengApprov pesanan <?= $data['nama_penyewa'] ?> ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <a href="<?= base_url('owner/pesanan/approv/' . $data['id_pesanan']) ?>" class="btn btn-primary">Approv</a>
            </div>
        </div>
    </div>
</div>

<!-- modal tolak -->
<div class="modal fade" id="tolak" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Tolak Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= base_url('owner/pesanan/tolak') ?>" method="post">
                <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
                <div class="modal-body">
                    Yakin ingin menolak pesanan <?= $data['nama_penyewa'] ?> ?
                    <div class="form-group">
                        <label for="alasan">Berikan Alasan:</label>
                        <input type="text" class="form-control" id="alasan" name="alasan" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button class="btn btn-danger" type="submit">Tolak</button>
                </div>
            </form>
        </div>
    </div>
</div>