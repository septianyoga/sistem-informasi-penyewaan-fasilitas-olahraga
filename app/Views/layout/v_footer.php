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

<footer>
    <div class="footer-wrapper">
        <!-- footer-bottom -->
        <div class="footer-bottom-area">
            <div class="container">
                <div class="footer-border">
                    <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-xl-10 col-lg-9 ">
                            <div class="footer-copy-right">
                                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                    Copyright &copy;<script>
                                        document.write(new Date().getFullYear());
                                    </script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll Up -->
<div id="back-top">
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script src="<?= base_url() ?>template/frontend/assets/js/vendorr/modernizr-3.5.0.min.js"></script>
<!-- Jquery, Popper, Bootstrap -->
<script src="<?= base_url() ?>template/frontend/assets/js/vendorr/jquery-1.12.4.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/popper.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/bootstrap.min.js"></script>
<!-- Jquery Mobile Menu -->
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.slicknav.min.js"></script>

<!-- Jquery Slick , Owl-Carousel Plugins -->
<script src="<?= base_url() ?>template/frontend/assets/js/owl.carousel.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/slick.min.js"></script>
<!-- One Page, Animated-HeadLin -->
<script src="<?= base_url() ?>template/frontend/assets/js/wow.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/animated.headline.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.magnific-popup.js"></script>

<!-- Date Picker -->
<script src="<?= base_url() ?>template/frontend/assets/js/gijgo.min.js"></script>
<!-- Nice-select, sticky -->
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.nice-select.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.sticky.js"></script>
<!-- Progress -->
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.barfiller.js"></script>

<!-- counter , waypoint,Hover Direction -->
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.counterup.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/waypoints.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.countdown.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/hover-direction-snake.min.js"></script>

<!-- contact js -->
<script src="<?= base_url() ?>template/frontend/assets/js/contact.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.form.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/mail-script.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/jquery.ajaxchimp.min.js"></script>

<!-- Jquery Plugins, main Jquery -->
<script src="<?= base_url() ?>template/frontend/assets/js/plugins.js"></script>
<script src="<?= base_url() ?>template/frontend/assets/js/main.js"></script>

<!-- aos -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script>
    AOS.init();
</script>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 4000);
</script>
</body>

</html>