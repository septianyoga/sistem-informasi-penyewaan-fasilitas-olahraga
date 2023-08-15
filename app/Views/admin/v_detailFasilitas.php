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
                            <a href="<?= base_url('admin/fasilitas') ?>" onclick="showLoading()" class="btn"><i class="bi bi-arrow-return-left"></i> Kembali</a>
                            <!-- <button class="btn btn-info">Tambah</button> -->
                        </div>
                    </div>
                    <hr style="margin-top: -15px;">
                    <div class="card-body">
                        <h5><?= $fasilitas['nama_fasilitas'] ?></h5>
                        <p><?= $fasilitas['keterangan'] ?></p>
                        <div class="row">
                            <div class="col-lg-8 col-12">
                                <div class="bd-example">
                                    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                        <ol class="carousel-indicators">
                                            <?php
                                            $i = 0;
                                            foreach ($foto as $row) { ?>
                                                <li data-target="#carouselExampleCaptions" data-slide-to="<?= $i ?>" class="<?= ($i == 0) ? 'active' : '' ?>"></li>
                                                <?php $i++; ?>
                                            <?php } ?>
                                        </ol>
                                        <div class="carousel-inner">
                                            <?php
                                            $bug = 0;
                                            foreach ($foto as $row) {
                                                $bug = $bug + 1;
                                            ?>
                                                <div class="carousel-item <?= ($bug == 1) ? 'active' : '' ?>">
                                                    <img src="<?= base_url('foto_fasilitas/' . $row['foto']) ?>" class="d-block w-100" alt="#">
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Previous</span>
                                        </a>
                                        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="sr-only">Next</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-12">
                                <h6>Harga</h6>
                                <p><?= $fasilitas['harga'] ?> / <?= $fasilitas['hargaper'] ?></p>
                                <h6>Kategori</h6>
                                <p><?= $fasilitas['nama_kategori'] ?></p>
                                <hr>
                                <h6>Nama Owner</h6>
                                <p><?= $dtPenyewa['nama_penyewa'] ?></p>
                                <h6>Alamat</h6>
                                <p><?= $fasilitas['alamat'] ?></p>
                                <h6>Lokasi</h6>
                                <p><?= $fasilitas['lokasi'] ?></p>
                                <h6>Email</h6>
                                <p><?= $dtPenyewa['email'] ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>