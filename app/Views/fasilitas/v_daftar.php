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
                <h3 class="contact-title">Atur Informasi Tempat</h3>
                <div class="progress">
                    <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 50%; background-color: #08b4ac;"></div>
                </div>
                <table width="100%" class="mt-3">
                    <tr>
                        <td class="text-center" style="color: #08b4ac;">
                            <h5 style="color: #08b4ac;">Atur Informasi Tempat</h5>
                        </td>
                        <td class="text-center">
                            <h5>Upload Fasilitas Olahraga</h5>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="col-lg-12 mt-5">
                <!-- <form class="form-contact contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate"> -->
                <?= form_open('insertOwner', ['class' => 'form-contact contact_form']); ?>
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
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="name">Nama Tempat <span class="text-danger">*</span></label>
                            <input class="form-control valid" name="nama" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nama Tempat Wajib Diisi'" placeholder="Masukan Nama Tempat" value="<?= $cekPenyewa['nama_penyewa'] ?>" required <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="email">Email <span class="text-danger">*</span></label>
                            <input class="form-control valid" name="email" id="email" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Email'" placeholder="Masukan Email" value="<?= $cekPenyewa['email'] ?>" required <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <label for="alamat">Alamat <span class="text-danger">*</span></label>
                            <input class="form-control valid" name="alamat" id="alamat" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Alamat Wajib Diisi'" placeholder="Masukan Alamat" value="<?= ($dataOwner != null) ? $dataOwner['alamat'] : old('alamat') ?>" <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <!-- <div class="col-sm-6">
                        <div class="form-group">
                            <label for="lokasi">Lokasi Koordinat GPS <span class="text-danger">*</span></label>
                            <input class="form-control valid" name="lokasi" id="lokasi" type="number" placeholder="Masukan Koordinat" value="<?= ($dataOwner != null) ? $dataOwner['lokasi'] :  old('lokasi') ?>" <?= ($dataOwner != null) ? 'readonly' : '' ?> autocomplete="off">
                        </div>
                    </div> -->
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label for="no_telp">Nomor Telepon <span class="text-danger">*</span></label>
                            <input class="form-control valid" name="no_telp" id="no_telp" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan No Telp Aktif'" placeholder="Masukan No Telp Aktif" value="<?= ($dataOwner != null) ? $dataOwner['no_telp'] :  old('no_telp') ?>" <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <label><b>Jenis Pembayaran yang disediakan :</b></label>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="jenis_rek">Jenis Rekening <small>(Kosongkan jika tidak ada)</small></label>
                            <div class="form-select" id="default-select">
                                <select name="jenis_rek" id="kategori" <?= ($dataOwner != null) ? 'disabled' : '' ?>>
                                    <?php if ($dataOwner != null) { ?>
                                        <option value="<?= $dataOwner['jenis_rek'] ?>" selected><?= $dataOwner['jenis_rek'] ?></option>
                                    <?php } else { ?>
                                        <option value="">~ Pilih ~</option>
                                        <option value="BANK BRI">BANK BRI</option>
                                        <option value="BANK MANDIRI">BANK MANDIRI</option>
                                        <option value="BANK BNI">BANK BNI</option>
                                        <option value="BANK BTN">BANK BTN</option>
                                        <option value="BANK BCA">BANK BCA</option>
                                        <option value="BANK CIMB NIAGA">BANK CIMB NIAGA</option>
                                        <option value="BANK DANAMON">BANK DANAMON</option>
                                        <option value="BANK PERMATA">BANK PERMATA</option>
                                        <option value="BANK MEGA">BANK MEGA</option>
                                        <option value="BANK BJB">BANK BJB</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="norek">Nomor Rekening <small>(Kosongkan jika tidak ada)</small></label>
                            <input class="form-control valid" name="no_rek" id="norek" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nomor Rekening'" placeholder="Masukan Nomor Rekening" value="<?= ($dataOwner != null) ? $dataOwner['no_rek'] :  old('no_rek') ?>" <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="nodana">Nomor Dana / Shopeepay <small>(Kosongkan jika tidak ada)</small></label>
                            <input class="form-control valid" name="no_dana_shopee" id="nodana" type="number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Masukan Nomor Dana / Shopeepay'" placeholder="Masukan Nomor Dana / Shopeepay" value="<?= ($dataOwner != null) ? $dataOwner['no_dana_shopee'] :  old('no_dana_shopee') ?>" <?= ($dataOwner != null) ? 'readonly' : '' ?>>
                        </div>
                    </div>
                </div>
                <div class="form-group mt-3">
                    <?php if ($dataOwner != null) { ?>
                        <a class="button button-contactForm boxed-btn" href="<?= base_url('daftarFasilitas') ?>"><?= ($dataFasilitas != null) ? 'Lanjut' : 'Upload Fasilitas' ?></a>
                    <?php } else { ?>
                        <button type="submit" class="button button-contactForm boxed-btn">Simpan dan Lanjut</button>
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