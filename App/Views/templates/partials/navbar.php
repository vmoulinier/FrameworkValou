<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a class="my-0 mr-md-auto font-weight-normal" href="<?= PATH ?>/"><h5><?= $this->twig->translation('home.index') ?></h5></a>

    <nav class="my-2 my-md-0 mr-md-3">
        <?php if($this->twig->logged()): ?>
            <?php if($this->twig->loggedAdmin()): ?>
                <a class="p-2 text-dark" href="<?= $this->router->generate('admin_index') ?>"><?= $this->twig->translation('home.admin') ?></a>
            <?php endif ?>
            <a class="p-2 text-dark" href="<?= $this->router->generate('user_profil') ?>"><?= $this->twig->translation('home.profil') ?></a>
        <?php endif ?>
    </nav>
    <?php if($this->twig->logged()): ?>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->router->generate('user_logout') ?>"><?= $this->twig->translation('home.logout') ?></a>
    <?php else: ?>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->router->generate('user_register') ?>"><?= $this->twig->translation('home.signup') ?></a>
        <a class="btn btn-outline-primary mr-1" href="<?= $this->router->generate('user_login') ?>"><?= $this->twig->translation('home.signin') ?></a>
    <?php endif ?>
    <?php if(isset($_SESSION['edit_admin_id'])): ?>
        <a href="<?= $this->router->generate('admin_relog') ?>" class="btn btn-success ml-1">Se reconnecter</a>
    <?php endif; ?>
</div>
