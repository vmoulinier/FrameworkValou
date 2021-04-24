<div class="d-flex flex-column flex-md-row align-items-center p-0 px-md-4 mb-2 bg-info border-bottom box-shadow">
    <a class="p-2 text-dark" href="<?= $this->url('admin_index') ?>"><?= $this->translation('home.admin') ?></a>
    <a class="p-2 text-dark " href="<?= $this->url('admin_translations') ?>"><?= $this->translation('home.translate') ?></a>
    <a class="p-2 text-dark mr-md-auto" href="<?= $this->url('admin_users') ?>"><?= $this->translation('admin.users') ?></a>
    <a class="btn btn-sm btn-primary" href="<?= $this->url('index') ?>"><?= $this->translation('home.index') ?></a>
    <?php if(isset($_SESSION['edit_admin_id'])): ?>
        <a href="<?= $this->url('admin_relog') ?>" class="btn btn-sm btn-success ml-1">Se reconnecter</a>
    <?php endif; ?>
</div>
