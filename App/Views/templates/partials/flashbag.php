<div class="d-flex justify-content-center">
    <div id="flashbag" class="w-50 center alert alert-<?= $flashBag[1]; ?>">
        <?= $flashBag[0]; ?>
    </div>
</div>

<script>
    $("#flashbag").delay(3000).fadeOut(1000);
</script>
