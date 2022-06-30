<?= $this->extend('template/administrator'); ?>

<?= $this->section('content'); ?>

<form action="">
    <div class="form-group">
        <input type="text" class="form-cotrol" name="komentar">
        <button type="button" class="btn btn-primary d-inline">komentar</button>

    </div>
    <div class="">
        <a onclick="balas()">balasan |</a>
        <a href=""> likes</a>
    </div>
</form>
<script type="text/javascript">
    function balas() {

    }
</script>
<script src="/assets/js/plugins/bootstrap.bundle.min.js"></script>
<script src="/assets/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/assets/js/scripts/script.min.js"></script>
<script src="/assets/js/scripts/sidebar.large.script.min.js"></script>
<?= $this->endSection(); ?>