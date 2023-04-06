<!-- ? Preloader Start -->
<!-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="<?= base_url() ?>/template/frontend/assets/img/logo/loder.png" alt="">
                </div>
            </div>
        </div>
    </div> -->
<!-- Preloader Start -->
<header>
    <!-- Header Start -->
    <div class="header-area header-transparent">
        <div class="main-header header-sticky">
            <div class="container-fluid">
                <div class="menu-wrapper d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <a href="/"><img src="<?= base_url() ?>/asset/img/logo.png" alt="" width="70"><span style="font-weight: 500;">SIPFOR</span></a>
                    </div>
                    <!-- Main-menu -->
                    <div class="main-menu f-right d-none d-lg-block">
                        <nav>
                            <ul id="navigation">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="listing.html">About</a></li>
                                <?php if (session()->get('log')) { ?>
                                    <li><a href="/pesanan">Pesanan</a></li>
                                <?php } ?>
                                <div id="login">
                                    <li><a href="<?= base_url('login') ?>" class="mr-40 login"><i class="ti-user"></i> Log in</a></li>
                                    <li><a href="<?= base_url('register') ?>" class="mr-40 login"><i class="ti-pencil"></i> Daftar</a></li>
                                </div>
                            </ul>
                        </nav>
                        <img src="<?= base_url() ?>/asset/img/user.png" width="30" alt="">
                    </div>
                    <!-- Header-btn -->
                    <?php
                    if (session()->get('log')) { ?>
                        <div class="header-btns d-lg-block f-right">
                            <a href="<?= base_url('login') ?>" class="mr-40 login"><i class="ti-user"></i> Log in</a>
                        </div>

                        <!-- <a href="<?= base_url('logout') ?>" class="mr-40 login"><i class="ti-user"></i> Log out</a> -->
                    <?php } else { ?>
                        <div class="header-btns d-none d-lg-block f-right">
                            <a href="<?= base_url('login') ?>" class="mr-40 login"><i class="ti-user"></i> Log in</a>
                            <a href="#" class="btn" style="background-color: unset; border: 1px solid #fff !important;">Daftar</a>
                        </div>
                    <?php } ?>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->
</header>