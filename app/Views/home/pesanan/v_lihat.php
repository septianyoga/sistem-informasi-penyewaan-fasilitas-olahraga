<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle d-flex justify-content-between">
                        <h3><b><a href="<?= base_url('pesanan') ?>"><i class="bi bi-chevron-left"></i> Pesanan</a></b></h3>
                        <h3 class="ml-4"><i class="bi bi-hourglass-split"></i> <?= $title ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                            </div>
                        </article>
                        <?php foreach ($data as $row) { ?>
                            <div class="row bg-light">
                                <div class="col-3 col-md-3 col-lg-3">
                                    <img src="<?= base_url('foto_fasilitas/' . $row['thumnail']) ?>" alt="" class="w-100">
                                </div>
                                <div class="col-9 col-md-9 col-lg-9">
                                    <h2 class="text-hijau"><?= $row['nama_fasilitas'] ?></h2>
                                    <p><i class="bi bi-pin-map"></i> <?= $row['alamat'] ?></p>
                                    <p><?= $row['hargaper'] ?> pemesanan : <?= date('d F Y', strtotime($row['tanggal'])) ?></p>
                                    <p>Total Pembayaran : Rp. <span class="badge rounded-pill bg-hijau" style="font-size: large;"><?= number_format($row['nominal'], 0, ",", ".") ?></span></p>
                                    <?php if ($row['status_pesanan'] == 'Belum Dibayar') { ?>
                                        <form action="<?= base_url('pesanan/lanjut_bayar/' . $row['id_pesanan']) ?>" method="get">
                                            <button type="submit" class="btn btn-primary btn-lg float-right">Lanjut Pembayaran</button>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                            <hr>
                        <?php } ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</main>