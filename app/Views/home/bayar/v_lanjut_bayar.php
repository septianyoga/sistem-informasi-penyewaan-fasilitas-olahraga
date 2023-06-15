<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle d-flex justify-content-between">
                        <h3><b><a href="<?= base_url('pesanan') ?>"><i class="bi bi-chevron-left"></i> Pesanan</a></b></h3>
                        <h3 class="ml-4"><?= $title ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
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
                                        <?php if ($data['no_rek'] != null || $data['no_dana_shopee'] != null) { ?>
                                            <p>No Rekening <?= $data['jenis_rek'] ?> : <?= $data['no_rek'] ?></p>
                                            <p>No Dana / Shopee : <?= $data['no_dana_shopee'] ?></p>
                                        <?php } ?>
                                        <h3 class="mb-3">Total yang harus dibayar : Rp<?= number_format($data['nominal'], 0, ",", ".") ?></h3>
                                        <h3 class=""><i class="bi bi-coin text-hijau"></i> Upload Bukti Pembayaran</h3>
                                        <div class="blog_right_sidebar">
                                            <aside class="single_sidebar_widget search_widget">
                                                <div class="form-group">
                                                    <div class="input-group mb-3">
                                                        <input type="hidden" name="id_pesanan" value="<?= $data['id_pesanan'] ?>">
                                                        <input class="form-control valid" name="bukti_pembayaran" type="file" placeholder="Masukan bukti pembayaran" required>
                                                    </div>
                                                </div>
                                            </aside>
                                        </div>
                                        <h3>Sisa Waktu Pembayaran : <span id="demo"></span></h3>
                                    </div>
                                    <div class="col-12 mt-4 justify-content-center d-flex">
                                        <button type="submit" class="btn btn-primary btn-lg" id="btn-lanjut">Bayar</button>
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
<script>
    // Set the date we're counting down to

    // Update the count down every 1 second
    // Set the date we're counting down to

    // Update the count down every 1 second
    <?php
    $tgl = $data['date_expired'];
    $tgljs = date('M d, Y H:i:s', strtotime($tgl));
    ?>
    var x = setInterval(function() {
        var countDownDate = new Date("<?= $tgljs ?>").getTime();

        // Get today's date and time
        var now = new Date().getTime();

        // Find the distance between now and the count down date
        var distance = countDownDate - now;

        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        // console.log(countDownDate)

        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = hours + "  Jam  " +
            minutes + "  Menit  " + seconds + "  Detik ";

        // If the count down is over, write some text 
        if (distance < 0) {
            // clearInterval(x);
            document.getElementById("demo").innerHTML = "Expired! Silahkan Melakukan Booking Kembali.";
            $('#btn-lanjut').addClass('d-none')
            setTimeout(() => document.location.href = '<?= base_url('pesanan') ?>', 3000);
        }
    }, 1000);
</script>