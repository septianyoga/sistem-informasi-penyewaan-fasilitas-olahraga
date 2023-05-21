<!-- loader Start -->
<!-- <div id="loading">
        <div id="loading-center">
        </div>
    </div> -->
<!-- loader END -->

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
                            <h3 class="mb-3 font-weight-bold text-center hijau">Sign Up</h3>
                            <div class="mb-5 mt-4">
                                <p class="line-around text-secondary mb-0 hijau"><span class="line-around-1">register your account to continue</span></p>
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
                            <?= form_open('verifikasi'); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-secondary hijau">Nama</label>
                                        <input class="form-control" name="nama" type="text" placeholder="Enter Nama">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-secondary hijau">Username</label>
                                        <input class="form-control" name="username" type="text" placeholder="Enter Username">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-secondary hijau">Email</label>
                                        <input class="form-control" name="email" type="email" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <label class="text-secondary hijau">Password</label>
                                        <input class="form-control" name="password" type="password" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Create Account</button>
                            <div class="col-lg-12 mt-3">
                                <p class="mb-0 text-center">Do you have an account? <a href="<?= base_url('login') ?>" class="hijau">Sign In</a></p>
                            </div>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>