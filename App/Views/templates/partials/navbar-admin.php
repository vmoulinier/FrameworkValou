<div class="d-flex flex-column flex-md-row align-items-center p-0 px-md-4 mb-2 bg-info border-bottom box-shadow">
    <a class="p-2 text-dark" href="<?= $this->router->generate('admin_index') ?>"><?= $this->twig->translation('home.admin') ?></a>
    <a class="p-2 text-dark " href="<?= $this->router->generate('admin_translations') ?>"><?= $this->twig->translation('home.translate') ?></a>
    <a class="p-2 text-dark mr-md-auto" href="<?= $this->router->generate('admin_users') ?>"><?= $this->twig->translation('admin.users') ?></a>
    <a class="btn btn-sm btn-primary" href="<?= $this->router->generate('index') ?>"><?= $this->twig->translation('home.index') ?></a>
    <?php if(isset($_SESSION['edit_admin_id'])): ?>
        <a href="<?= $this->router->generate('admin_relog') ?>" class="btn btn-sm btn-success ml-1">Se reconnecter</a>
    <?php endif; ?>
</div>
