<div class="d-flex flex-column flex-md-row align-items-center p-1 px-md-4 mb-2 bg-info border-bottom box-shadow">
    <a class="p-2 text-dark" href="<?= PATH ?>/admin/index"><?= $this->twig->translation('home.admin') ?></a>
    <a class="p-2 text-dark " href="<?= PATH ?>/admin/translations"><?= $this->twig->translation('home.translate') ?></a>
    <a class="p-2 text-dark mr-md-auto" href="<?= PATH ?>/admin/users"><?= $this->twig->translation('admin.users') ?></a>
    <a class="btn btn-primary" href="<?= PATH ?>/home/index"><?= $this->twig->translation('home.index') ?></a>
    <?php if(isset($_SESSION['edit_admin_id'])): ?>
        <a href="<?=PATH?>/admin/relog" class="btn btn-success ml-1">Se reconnecter</a>
    <?php endif; ?>
</div>