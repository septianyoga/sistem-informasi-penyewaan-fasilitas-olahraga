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
                                <h1 class="ml-4"><?= $title ?></h1>
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
                                <?= form_open_multipart(base_url('upload_pembayaran')) ?>
                                <div class="row bg-light">
                                    <div class="col-12 col-md-12 col-lg-12">
                                        <?php if ($owner['no_rek'] != null || $owner['no_dana_shopee'] != null) { ?>
                                            <p>No Rekening <?= $owner['jenis_rek'] ?> : <?= $owner['no_rek'] ?></p>
                                            <p>No Dana / Shopee : <?= $owner['no_dana_shopee'] ?></p>
                                        <?php } ?>
                                        <h3 class=""><i class="bi bi-coin text-hijau"></i> Upload Bukti Pembayaran</h3>
                                        <div class="single-element-widget mt-30">
                                            <div class="form-group">
                                                <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
                                                <input class="form-control valid" name="bukti_pembayaran" type="file" placeholder="Masukan bukti pembayaran" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 mt-4 justify-content-center d-flex">
                                        <button type="submit" class="btn btn-primary btn-lg">Bayar</button>
                                    </div>
                                </div>
                                <?= form_close() ?>
                            </div>
                        </article>

                    </div>
                </div>

            </div>
        </div>
    </section>
</main>