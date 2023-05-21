<main>

    <!--? Hero Area Start-->
    <div class="slider-area hero-bg1 hero-overly" style="background-image: url(<?= base_url() ?>/asset/img/gambar-atlet.jpg) !important; background-size: cover;">
        <div class="single-slider hero-overly  slider-height2 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 col-lg-10">
                        <!-- Hero Caption -->
                        <div class="hero__caption hero__caption2 pt-100">
                            <h1>Daftar Fasilitas</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-12">
                <?= ($fasilitas == null) ? '<h3 class="contact-title">Upload Tempat Fasilitas</h3>' : '<h3 class="contact-title">Menunggu Validasi Admin...</h3>' ?>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 100%; background-color: #08b4ac;"></div>
                </div>
                <table width="100%" class="mt-3">
                    <tr>
                        <td class="text-center">
                            <h5 style="<?= ($fasilitas != null) ? 'color: #08b4ac;' : '' ?>">Atur Informasi Tempat <i class="bi bi-check2-circle"></i></h5>
                        </td>
                        <td class="text-center">
                            <h5 style="color: #08b4ac;">Upload Fasilitas Olahraga <?= ($fasilitas != null) ? '<i class="bi bi-check2-circle"></i>' : '' ?></h5>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12 mt-5">
                <!-- <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate"> -->
                <?= form_open_multipart('addFasilitas', ['class' => 'form-contact contact_form']); ?>
                <div class="row">
                    <div class="col-12">
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
                        <?php if (session()->getFlashdata('pesan')) { ?>
                            <div class="alert alert-success" role="alert">
                                <?= session()->getFlashdata('pesan') ?>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- jika owner sudah upload fasilitas maka tampilkan fasilitasnya -->
                    <?php
                    if ($fasilitas == null && $foto == null) {
                    ?>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nama">Nama Fasilitas <span class="text-danger">*</span></label>
                                <input class="form-control valid" name="nama" id="nama" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nama Fasilitas Olahraga'" placeholder="Masukan Nama Fasilitas Olahraga" value="<?= old('nama') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="foto">Tambah Foto <span class="text-danger">*</span></label>
                                <input class="form-control valid" name="foto[]" id="foto" type="file" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Foto Wajib Diisi'" placeholder="Masukan Foto" multiple="true">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="keterangan">Keterangan <span class="text-danger">*</span></label>
                                <textarea class="form-control w-100" name="keterangan" id="keterangan" cols="30" rows="9" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan keterangan'" placeholder="Masukan Keterangan"><?= old('keterangan') ?></textarea>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="harga">Harga <span class="text-danger">*</span></label>
                                <input class="form-control valid" name="harga" id="harga" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Harga'" placeholder="Masukan Harga" value="<?= old('harga') ?>">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="hargaper">Harga Per <span class="text-danger">*</span></label>
                                <div class="form-select" id="default-select">
                                    <select name="hargaper" id="hargaper">
                                        <option value="">~ Pilih ~</option>
                                        <option value="Hari">Hari</option>
                                        <option value="Jam">Jam</option>
                                    </select>
                                </div>
                                <!-- <input class="form-control valid" name="alamat" id="alamat" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Alamat'" placeholder="Masukan Alamat" value="<?= old('alamat') ?>"> -->
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="kategori">Katogori <span class="text-danger">*</span></label>
                                <div class="form-select" id="default-select">
                                    <select name="kategori" id="kategori">
                                        <option value="">~ Pilih ~</option>
                                        <?php
                                        foreach ($kategori as $row) {
                                        ?>
                                            <option value="<?= $row['id_kategori'] ?>"><?= $row['nama_kategori'] ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <label><b>Pembayaran :</b></label>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="norek">Nomor Rekening <small>(Kosongkan jika tidak ada)</small></label>
                                <input class="form-control valid" name="norek" id="norek" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nomor Rekening'" placeholder="Masukan Nomor Rekening" value="<?= old('norek') ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nodana">Nomor Dana / Shopeepay <small>(Kosongkan jika tidak ada)</small></label>
                                <input class="form-control valid" name="nodana" id="nodana" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nomor Dana / Shopeepay'" placeholder="Masukan Nomor Dana / Shopeepay" value="<?= old('nodana') ?>">
                            </div>
                        </div>
                    <?php } else { ?>
                        <div class="directory-details">
                            <div class="container">
                                <div class="gallery-img">
                                    <div class="row justify-content-center">
                                        <?php foreach ($foto as $data) { ?>
                                            <div class="col-lg-3 col-4">
                                                <img src="<?= base_url() ?>foto_fasilitas/<?= $data['foto'] ?>" class="mb-30" alt="">
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12" style="margin-top: -40px !important;">
                            <hr width="100%" size="20%" color=>
                        </div>
                        <div class="col-lg-12 col-12 mb-3">
                            <h3>Nama Fasilitas :</h3>
                            <input class="form-control valid" name="nama" id="nama" type="text" value="<?= $fasilitas['nama_fasilitas'] ?>" readonly>
                        </div>
                        <div class="col-lg-12 col-12 mb-5">
                            <h3>Keterangan Fasilitas:</h3>
                            <textarea class="form-control w-100" name="keterangan" id="keterangan" cols="30" rows="7" readonly><?= $fasilitas['keterangan'] ?></textarea>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <h3>Harga Per</h3>
                            <input class="form-control valid" name="nama" id="nama" type="text" value="<?= $fasilitas['harga'] . ' / ' . $fasilitas['hargaper'] ?>" readonly>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <h3>Kategori</h3>
                            <input class="form-control valid" name="nama" id="nama" type="text" value="<?= $fasilitas['nama_kategori'] ?>" readonly>
                        </div>
                    <?php } ?>
                </div>
                <div class="form-group mt-3">
                    <a href="<?= base_url('daftar') ?>" class="genric-btn info-border radius" style=""><i class="bi bi-arrow-left"></i> Kembali</a>
                    <?php if ($fasilitas == null) { ?>
                        <button type="submit" style="float: right !important;" class="button button-contactForm boxed-btn">Simpan</button>
                    <?php } ?>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>

    <!--? Want To work 02-->
    <section class="">
        <div class="container">
            <div class="wants-wrapper w-padding2">
                <div class="row justify-content-between">
                    <div class="col-xl-8 col-lg-8 col-md-7">
                        <div class="wantToWork-caption wantToWork-caption2">
                            <a href="/" class="text-dark">
                                <img src="<?= base_url() ?>/asset/img/logo-warna.png" width="70vw" alt="" class="mb-20">
                                <span style="font-weight: 500; font-size: x-large;">SIPFOR</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-5">
                        <div class="footer-social f-right sm-left">
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-pinterest-p"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>

<script>
    var splide = new Splide('.splide', {
        type: 'fade',
        rewind: true,
    });

    splide.mount();
</script>