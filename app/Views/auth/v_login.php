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
                            <h3 class="mb-3 font-weight-bold text-center hijau">Sign In</h3>
                            <!-- <p class="text-center text-secondary mb-4">Log in to your account to continue</p> -->
                            <div class="mb-5 mt-5">
                                <p class="line-around text-secondary mb-0 hijau"><span class="line-around-1">Log in with your account</span></p>
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
                            <?= form_open('cek_login'); ?>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label class="text-secondary hijau">Email / Username</label>
                                        <input class="form-control" name="username_email" type="text" placeholder="Enter Email or Username" value="<?= old('username_email') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-12 mt-2">
                                    <div class="form-group">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="text-secondary hijau">Password</label>
                                            <label><a class="hijau" href="auth-recover-pwd.html">Forgot Password?</a></label>
                                        </div>
                                        <input class="form-control" name="password" type="password" placeholder="Enter Password">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mt-2">Log In</button>
                            <div class="col-lg-12 mt-3">
                                <p class="mb-0 text-center">Don't have an account? <a class="hijau" href="/register">Sign Up</a></p>
                            </div>
                            <?= form_close(); ?>
                            <p class="line-around text-secondary mb-0 mt-3 hijau"><span class="line-around-1"><a class="hijau" href="/">Back to Home</a></span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>