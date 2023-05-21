<!-- loader Start -->
<!-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> -->
<!-- loader END -->
<!-- style dadakan -->
<style>
    .error {
        border-color: red !important;
    }
</style>

<div class="wrapper">
    <section class="login-content">
        <div class="container h-100">
            <div class="row align-items-center justify-content-center h-100">
                <div class="col-md-5">
                    <div class="card p-3">
                        <div class="card-body">
                            <div class="auth-logo">
                                <img src="<?= base_url() ?>/asset/img/logo-warna.png" class="img-fluid rounded-normal light-logo" alt="logo">
                            </div>
                            <h3 class="mb-3 font-weight-bold text-center hijau">Verifikasi Email Anda</h3>
                            <div class="mb-5 mt-4">
                                <p class="line-around text-secondary mb-0 hijau"><span class="line-around-1">Masukan Kode Verifikasi</span></p>
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
                            <?= form_open('add'); ?>
                            <input name="nama_penyewa" type="hidden" value="<?= $data['nama_penyewa'] ?>">
                            <input name="username" type="hidden" value="<?= $data['username'] ?>">
                            <input name="email" type="hidden" value="<?= $data['email'] ?>">
                            <input name="password" type="hidden" value="<?= $data['password'] ?>">
                            <input name="role" type="hidden" value="<?= $data['role'] ?>">
                            <div class="row">
                                <div class="col-12 text-center" style="margin-top: -15px !important;">
                                    <span class="otp" style="font-size: xx-large; font-weight: bold;">
                                    </span>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group text-center">
                                        <label class="text-secondary hijau">Kode verifikasi (OTP) telah dikirm melalui Email</label>
                                        <p class="text-center"><?= $data['email'] ?></p>
                                        <input style="text-align: center;" maxlength="6" class="form-control" id="otp" name="nama" type="number" placeholder="Ketik disini">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2 btn-lanjut" disabled>Lanjut</button>
                            <?= form_close(); ?>
                            <?= form_open('verifikasi'); ?>
                            <input name="nama" type="hidden" value="<?= $data['nama_penyewa'] ?>">
                            <input name="username" type="hidden" value="<?= $data['username'] ?>">
                            <input name="email" type="hidden" value="<?= $data['email'] ?>">
                            <input name="password" type="hidden" value="<?= $data['password'] ?>">
                            <input name="role" type="hidden" value="<?= $data['role'] ?>">
                            <div class="col-lg-12 mt-3 append text-center">
                                <p class="mb-0 text-center count">Mohon tunggu <span class="timer">120</span> detik untuk mengirim ulang</p>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>

</script>