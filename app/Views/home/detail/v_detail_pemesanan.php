<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle ">
                        <h3><b><a href="<?= base_url('sewa/' . $data['id_fasilitas']) ?>"><i class="bi bi-chevron-left"></i> Kembali</a></b></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <h1 class="ml-4">Detail Pesanan</h1>
                            </div>
                            <div class="blog_details">
                                <div class="row bg-light">
                                    <div class="col-3 col-md-3 col-lg-3">
                                        <img src="<?= base_url('foto_fasilitas/' . $fasilitas['thumnail']) ?>" alt="" class="w-100">
                                    </div>
                                    <div class="col-9 col-md-9 col-lg-9">
                                        <h2 class="text-hijau"><?= $fasilitas['nama_fasilitas'] ?></h2>
                                        <p><i class="bi bi-pin-map"></i> <?= $fasilitas['alamat'] ?></p>
                                        <p><?= $fasilitas['hargaper'] ?> pemesanan : <?= date('d F Y', strtotime($data['tanggal'])) ?></p>
                                        <p>Total Pembayaran : Rp. <span class="badge rounded-pill bg-hijau" style="font-size: large;"><?= number_format($data['nominal'], 0, ",", ".") ?></span></p>
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <h1 class=""><i class="bi bi-coin text-hijau"></i> Metode Pembayaran</h1>
                                        <div class="single-element-widget mt-30">
                                            <h3 class="mb-30">Pilih</h3>
                                            <form action="<?= base_url('bayar') ?>" method="post">
                                                <input type="hidden" name="id_penyewa" value="<?= $data['id_penyewa'] ?>">
                                                <input type="hidden" name="id_fasilitas" value="<?= $data['id_fasilitas'] ?>">
                                                <input type="hidden" name="tanggal" value="<?= $data['tanggal'] ?> <?= ($fasilitas['hargaper'] == 'Hari') ? date('H:i:s') : '' ?>">
                                                <input type="hidden" name="nominal" value="<?= $data['nominal'] ?>">
                                                <div class="row">
                                                    <div class="col-12 col-md-12 col-lg-6">
                                                        <?php if ($fasilitas['no_rek'] != null || $fasilitas['no_dana_shopee'] != null) { ?>
                                                            <div class="switch-wrap d-flex align-items-center bg-hijau pl-3 " style="border-radius: 30px;">
                                                                <div class="primary-radio">
                                                                    <input type="radio" id="non_tunai" name="metode_pembayaran" class="bg-primary" value="Non Tunai" required>
                                                                    <label for="non_tunai"></label>
                                                                </div>
                                                                <label for="non_tunai" class="ml-2 d-flex">
                                                                    <h2 class="text-white pt-4">Non Tunai </h2>
                                                                    <span class="mt-4 ml-3">(<?= $fasilitas['jenis_rek'] ?>, <?= $fasilitas['no_dana_shopee'] ? 'Shopee / Dana' : '' ?>)</span>
                                                                </label>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="switch-wrap d-flex align-items-center bg-hijau pl-3" style="border-radius: 30px;">
                                                            <div class="primary-radio">
                                                                <input type="radio" name="metode_pembayaran" id="tunai" value="Tunai" required>
                                                                <label for="tunai"></label>
                                                            </div>
                                                            <label for="tunai" class="ml-2">
                                                                <h2 class="text-white pt-4">Tunai</h2>
                                                            </label>
                                                        </div>

                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 justify-content-center d-flex">
                                        <button type="submit" class="btn btn-primary btn-lg">Bayar</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </article>

                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Blog Area End -->
    <!-- Want To work End -->
    <!-- Want To work 01-->

    <!-- Want To work End -->
</main>