<h2 class="center"><?= $this->twig->translation('login.title') ?></h2>
<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', $this->twig->translation('login.email'), ['type' => 'email']); ?>
            <?= $form->input('password', $this->twig->translation('login.password'), ['type' => 'password']); ?>
            <?= $form->submit($this->twig->translation('login.login')); ?>
        </form>
    </div>
</div>
