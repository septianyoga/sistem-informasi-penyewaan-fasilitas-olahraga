<footer class="iq-footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="../backend/privacy-policy.html">Privacy Policy</a></li>
                    <li class="list-inline-item"><a href="../backend/terms-of-service.html">Terms of Use</a></li>
                </ul>
            </div>
            <div class="col-lg-6 text-right">
                <span class="mr-1">
                    Copyright
                    <script>
                        document.write(new Date().getFullYear())
                    </script>© <a href="#" class="">Datum</a>
                    All Rights Reserved.
                </span>
            </div>
        </div>
    </div>
</footer> <!-- Backend Bundle JavaScript -->
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
<script src="<?= base_url() ?>/template/backend/html/assets/vendor/emoji-picker-element/index.js" type="module"></script>


<!-- app JavaScript -->
<script src="<?= base_url() ?>/template/backend/html/assets/js/app.js"></script>

<?php if (session()->getFlashdata('pesan')) { ?>
    <script>
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: '<?= session()->getFlashdata('pesan') ?>',
            showConfirmButton: false,
            timer: 2000
        })
    </script>
<?php } ?>
<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(1000, 0).slideUp(1000, function() {
            $(this).remove();
        });
    }, 6000);
</script>
</body>

</html>