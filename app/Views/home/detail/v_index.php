<main>
    <!--? Blog Area Start-->
    <section class="blog_area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mb-5 mb-lg-0">
                    <div class="blog_left_sidebar">
                        <article class="blog_item">
                            <div class="blog_item_img">
                                <div class="row justify-content-center">
                                    <div class="d-flex flex-row flex-nowrap overflow-auto" style="width: 100%; display: flex !important; flex-wrap: nowrap !important; overflow: auto !important;">
                                        <?php foreach ($foto as $gambar) { ?>
                                            <div class="col-lg-12 col-md-12 col-12">
                                                <img class="card-img rounded-0 w-100" src="<?= base_url('foto_fasilitas/' . $gambar['foto']) ?>" alt="">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="blog_details">
                                <a class="d-inline-block" href="">
                                    <h2 class="blog-head"><?= $fasilitas['nama_fasilitas'] ?></h2>
                                </a>
                                <p><?= $fasilitas['keterangan'] ?></p>
                                <p>Harga : Rp. <?= $fasilitas['harga'] . ' / ' . $fasilitas['hargaper'] ?></p>
                                <ul class="blog-info-link ">
                                    <li><a href="#"><i class="bi bi-tag"></i> <?= $fasilitas['nama_kategori'] ?></a></li>
                                    <li><a href="#"><i class="fa fa-comments"></i> 03 Comments</a></li>
                                    <form action="<?= base_url('sewa/' . $fasilitas['id_fasilitas']) ?>" method="post">
                                        <button class="btn btn-primary float-right">Sewa Sekarang</button>
                                    </form>
                                </ul>
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