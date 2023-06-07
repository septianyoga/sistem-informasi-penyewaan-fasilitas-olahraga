<main style="height: 2000px;">

    <!--? Popular Directory Start -->
    <div class="popular-directorya-area border-bottom section-padding40 fix">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Section Tittle -->
                    <div class="section-tittle mt-5 ">
                        <h2><b><a href="<?= base_url('#kategori') ?>"><i class="bi bi-chevron-left"></i> <?= $kategori ?></a></b></h2>
                    </div>
                </div>
            </div>
            <section class="blog_area ">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="blog_right_sidebar ">
                                <aside class="search_widget ">
                                    <form action="">
                                        <div class="form-group">
                                            <div class="input-group mb-3">
                                                <input type="text" class="form-control" placeholder="Cari <?= $kategori ?>">
                                                <div class="input-group-append">
                                                    <button class="btns" type="submit"><i class="ti-search"></i></button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <div class="listing-area pt-50">
            <div class="container">
                <div class="row">
                    <!--?  Right content -->
                    <div class="col-xl-12 col-lg-12 col-md-6">
                        <!--? Popular Directory Start -->
                        <div class="popular-directorya-area fix">
                            <div class="row">
                                <?php foreach ($data as $row) { ?>
                                    <div class="col-lg-6">
                                        <!-- Single -->
                                        <div class="properties properties2 mb-30">
                                            <div class="properties__card">
                                                <div class="properties__img overlay1">
                                                    <a href="<?= base_url('fasilitas/' . $row['id_fasilitas']) ?>"><img src="<?= base_url('foto_fasilitas/' . $row['thumnail']) ?>" alt="gambar fasilitas" style="height: 350px;"></a>
                                                </div>
                                                <div class="properties__caption">
                                                    <h3><a href="<?= base_url('fasilitas/' . $row['id_fasilitas']) ?>"><?= $row['nama_fasilitas'] ?></a></h3>
                                                    <p><?= substr($row['keterangan'], 0, 60) . "...."  ?></p>
                                                    <p><i class="bi bi-pin-map"></i> <?= substr($row['alamat'], 0, 50) . "...." ?></p>
                                                </div>
                                                <div class="properties__footer d-flex justify-content-between align-items-center">
                                                    <div class="restaurant-name">
                                                        <h3 class="text-hijau">Rp. <?= number_format($row['harga'], 0, ",", ".") ?> / <?= $row['hargaper'] ?></h3>
                                                    </div>
                                                    <div class="heart">
                                                        <img src="<?= base_url('template/frontend/') ?>assets/img/gallery/heart1.png" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <!--? Popular Directory End -->
                        <!--Pagination Start  -->
                        <!-- <div class="pagination-area text-center">
                            <div class="container">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="single-wrap d-flex justify-content-center">
                                            <nav aria-label="Page navigation example">
                                                <ul class="pagination justify-content-start " id="myDIV">
                                                    <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-left"></span></a></li>
                                                    <li class="page-item active"><a class="page-link" href="#">01</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">02</a></li>
                                                    <li class="page-item"><a class="page-link" href="#">03</a></li>
                                                    <li class="page-item"><a class="page-link" href="#"><span class="ti-angle-right"></span></a></li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!--Pagination End  -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>