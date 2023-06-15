<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle d-flex justify-content-between">
                        <h3><b><a href="<?= base_url('pesanan') ?>"><i class="bi bi-chevron-left"></i> Pesanan</a></b></h3>
                        <h3 class="ml-4"><i class="bi bi-filter-right"></i> <?= $title ?></h3>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <!-- <div id="demo"></div> -->
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
                                    <p>Metode Pembayaran : <?= $row['metode_pembayaran'] ?></p>
                                    <p>Total Pembayaran : Rp. <span class="badge rounded-pill bg-hijau" style="font-size: large;"><?= number_format($row['nominal'], 0, ",", ".") ?></span></p>
                                    <?php if ($row['status_pesanan'] == 'Belum Dibayar') { ?>
                                        <p>Waktu Pembayaran Tersisa : <span class="badge rounded-pill bg-hijau" id="demo-<?= $row['id_pesanan'] ?>"></span></p>
                                    <?php } ?>
                                    <?php if ($title == 'Belum Dibayar' && $row['metode_pembayaran'] == 'Non Tunai') { ?>
                                        <form action="<?= base_url('pesanan/lanjut_bayar/' . $row['id_pesanan']) ?>" method="get">
                                            <button type="submit" class="btn btn-primary btn-lg float-right" id="btn-lanjut-<?= $row['id_pesanan'] ?>">Lanjut Pembayaran</button>
                                        </form>
                                    <?php } elseif ($title == 'Ditolak') { ?>
                                        <p>Alasan Ditolak : <?= $row['alasan_tolak'] ?></p>
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
<?php if ($title == 'Belum Dibayar') { ?>
    <?php
    foreach ($data as $key => $row) {
        // foreach ($data as $row) {
        $tgl = $row['date_expired'];
        $tgljs = date('M d, Y H:i:s', strtotime($tgl));
    ?>
        <script>
            // Set the date we're counting down to
            // var countDownDate = '<?= $tgljs ?>';

            // Update the count down every 1 second
            // Set the date we're counting down to

            // Update the count down every 1 second
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
                document.getElementById("demo-<?= $row['id_pesanan'] ?>").innerHTML = hours + "  Jam  " +
                    minutes + "  Menit  " + seconds + "  Detik ";

                // If the count down is over, write some text 
                if (distance < 0) {
                    // clearInterval(x);
                    document.getElementById("demo-<?= $row['id_pesanan'] ?>").innerHTML = "Expired! Silahkan Melakukan Booking Kembali.";
                    $('#btn-lanjut-<?= $row['id_pesanan'] ?>').addClass('d-none')
                }
            }, 1000);
        </script>
    <?php } ?>
<?php } ?>