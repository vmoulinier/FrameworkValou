<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a class="my-0 mr-md-auto font-weight-normal" href="<?= PATH ?>/"><h5><?= $this->translation('home.index') ?></h5></a>

    <nav class="my-2 my-md-0 mr-md-3">
        <?php if($this->twig->logged()): ?>
            <?php if($this->twig->loggedAdmin()): ?>
                <a class="p-2 text-dark" href="<?= $this->url('admin_index') ?>"><?= $this->translation('home.admin') ?></a>
            <?php endif ?>
            <a class="p-2 text-dark" href="<?= $this->url('user_profil') ?>"><?= $this->translation('home.profil') ?></a>
        <?php endif ?>
    </nav>
    <?php if($this->twig->logged()): ?>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->url('user_logout') ?>"><?= $this->translation('home.logout') ?></a>
    <?php else: ?>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->url('user_register') ?>"><?= $this->translation('home.signup') ?></a>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->url('user_login') ?>"><?= $this->translation('home.signin') ?></a>
    <?php endif ?>
    <?php if(isset($_SESSION['edit_admin_id'])): ?>
        <a href="<?= $this->url('admin_relog') ?>" class="btn btn-success ml-1">Se reconnecter</a>
    <?php endif; ?>
</div>
