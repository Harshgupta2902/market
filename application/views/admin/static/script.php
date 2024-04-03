<script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
        var options = {
            damping: '0.5'
        }
        Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
</script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>

    <script src="<?= base_url('assets/admin/js/soft-ui-dashboard.min.js?v=1.1.0') ?>"></script>
    <script src="<?= base_url('assets/admin/js/core/popper.min.js') ?>"></script>
    <script src="<?= base_url('assets/admin/js/core/bootstrap.min.js') ?>"></script>