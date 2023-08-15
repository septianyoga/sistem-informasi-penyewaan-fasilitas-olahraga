<!-- Backend Bundle JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/backend-bundle.min.js"></script>
<!-- Chart Custom JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/customizer.js"></script>

<script src="<?= base_url() ?>/template/backend/html/assets/js/sidebar.js"></script>

<!-- Flextree Javascript-->
<script src="<?= base_url() ?>/template/backend/html/assets/js/flex-tree.min.js"></script>
<script src="<?= base_url() ?>/template/backend/html/assets/js/tree.js"></script>

<!-- Table Treeview JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/table-treeview.js"></script>

<!-- SweetAlert JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/sweetalert.js"></script>

<!-- Vectoe Map JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/vector-map-custom.js"></script>

<!-- Chart Custom JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/chart-custom.js"></script>
<script src="<?= base_url() ?>/template/backend/html/assets/js/charts/01.js"></script>
<script src="<?= base_url() ?>/template/backend/html/assets/js/charts/02.js"></script>

<!-- slider JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/slider.js"></script>

<!-- Emoji picker -->
<script src="<?= base_url() ?>/template/backend/html/assets/vendorr/emoji-picker-element/index.js" type="module"></script>


<!-- app JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/app.js"></script>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 6000);
</script>
<?php if ($title == 'Verifikasi Email') { ?>
    <script>
        $(document).ready(function() {
            $('#otp').on('input', function() {
                $otp = $(this).val();
                $('.textOtp').remove()
                $('.otp').append('<p class="textOtp hijau">' + $otp + '</p>')
                if ($otp.length == 6) {
                    if ($otp == <?= $otp ?>) {
                        $('.btn-lanjut').removeAttr('disabled')
                        $(this).removeClass('error')
                    } else {
                        $(this).addClass('error')
                        $('.btn-lanjut').prop('disabled', true)
                    }
                } else {
                    $('.btn-lanjut').prop('disabled', true)
                }
            })
        })
    </script>
    <script>
        function count(time) {
            var interval = setInterval(function() {
                $('.timer').text(time);
                time = time - 1;

                if (time == -2) {
                    $('.count').remove();
                    $('.append').append('<button type="submit" style="background-color: transparent !important; border: unset !important;" class="hijau">Kirim Ulang</button>')
                }
            }, 1000);
        }
        $(document).ready(function() {
            count(119);
        })
    </script>
<?php } ?>
</body>

</html>