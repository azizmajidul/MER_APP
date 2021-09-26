<!-- Bootstrap core JavaScript-->
<script src="<?= base_url() ?>assets/sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url() ?>assets/sbadmin2/js/sb-admin-2.min.js"></script>

</body>

</html>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(300, 0).slideUp(300, function() {
            $(this).remove();
        });
    }, 1500);
</script>       