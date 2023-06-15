<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle ">
                        <h3><b><a href="<?= base_url('sewa/') ?>"><i class="bi bi-chevron-left"></i> Pesanan</a></b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <h1 class="ml-4"><i class="bi bi-journal-check"></i> Pesanan Saya</h1>
                            </div>
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
                            <div class="blog_details">
                                <div class="row text-center">
                                    <div class="col-3">
                                        <a href="<?= base_url('pesanan/lihat/belum_bayar') ?>" class="pesanan justify-content-center d-flex align-items-start"><i class="bi bi-wallet" style="font-size: 6vw;"></i>
                                            <?php if ($belum) { ?><i class="bi bi-<?= $belum ?>-circle text-danger" style="font-size: 2vw;"></i><?php } ?>
                                        </a>
                                        <h4 style="font-size: 1.5vw;">Belum Bayar</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="<?= base_url('pesanan/lihat/menunggu_verifikasi') ?>" class="pesanan justify-content-center d-flex align-items-start"><i class="bi bi-person" style="font-size: 6vw;"></i>
                                            <?php if ($dibayar) { ?><i class="bi bi-<?= $dibayar ?>-circle" style="font-size: 2vw;"></i><?php } ?>
                                        </a>
                                        <h4 style="font-size: 1.5vw;">Menunggu Verifikasi</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="<?= base_url('pesanan/lihat/terverifikasi') ?>" class="pesanan justify-content-center d-flex align-items-start"><i class="bi bi-person-check" style="font-size: 6vw;"></i>
                                            <?php if ($diverif) { ?><i class="bi bi-<?= $diverif ?>-circle" style="font-size: 2vw;"></i><?php } ?>
                                        </a>
                                        <h4 style="font-size: 1.5vw;">Terverifikasi</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="<?= base_url('pesanan/lihat/ditolak') ?>" class="pesanan justify-content-center d-flex align-items-start"><i class="bi bi-x-circle" style="font-size: 6vw;"></i>
                                            <?php if ($ditolak) { ?><i class="bi bi-<?= $ditolak ?>-circle" style="font-size: 2vw;"></i><?php } ?>
                                        </a>
                                        <h4 style="font-size: 1.5vw;" class="mr-4">Ditolak</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <h3><i class="bi bi-clock-history"></i> Riwayat Pemesanan</h3>
                                    <div class="d-flex flex-row flex-nowrap overflow-auto" style="overflow: auto !important; width: 100%;">
                                        <?php
                                        foreach ($selesai as $row) {
                                            // if ($row['date_expired'] < date('Y-m-d H:i:s') || $row['status_pesanan'] == 'Ditolak' || $row['status_pesanan'] == 'Selesai') {
                                            if ($row['status_pesanan'] == 'Belum Dibayar' && $row['date_expired'] > date('Y-m-d H:i:s')) {
                                                // echo 'Belum ada riwayat pesanan!';
                                            } else {
                                                // if ($row['status_pesanan'] != 'Diapprov') {
                                        ?>
                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="card card-block">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-5">
                                                                    <img class="w-100" src="<?= base_url('foto_fasilitas/' . $row['thumnail']) ?>" alt="">
                                                                </div>
                                                                <div class="col-7">
                                                                    <h4 class="card-title">Nama Fasilitas : <?= $row['nama_fasilitas'] ?></h4>
                                                                    <p class="card-text">Harga : <?= $row['harga'] ?> </p>
                                                                </div>
                                                            </div>
                                                            <span>Tanggal Pemesanan : </span>
                                                            <p><?= $row['tanggal'] ?></p>
                                                            <p>Status Pesanan :
                                                                <?php if ($row['status_pesanan'] == 'Belum Dibayar') { ?>
                                                                    Expired
                                                                <?php } elseif ($row['status_pesanan'] == 'Ditolak') { ?>
                                                                    Ditolak
                                                                <?php } elseif ($row['tanggal'] > date('Y-m-d H:i:s')) { ?>
                                                                    Sedang Disewa
                                                                <?php } elseif ($row['tanggal'] < date('Y-m-d H:i:s')) { ?>
                                                                    Selesai
                                                                <?php } else {
                                                                    echo 'Selesai';
                                                                } ?>
                                                            </p>
                                                            <a href="<?= base_url('fasilitas/' . $row['id_fasilitas']) ?>" class="bg-hijau p-3" style="border-radius: 10px;">Pesan Lagi</a>
                                                            <!-- <a href="<?= base_url('admin/verifFasilitas/verif/') ?>" class="btn btn-success btn-sm">Verifikasi</a> -->
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php
                                                // }
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>