<h2 class="center"><?= $this->twig->translation('register.title') ?></h2>

<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', $this->twig->translation('register.email'), ['type' => 'email']); ?>
            <?= $form->input('name', $this->twig->translation('register.name'), ['type' => 'text']); ?>
            <?= $form->input('firstname', $this->twig->translation('register.firstname'), ['type' => 'text']); ?>
            <?= $form->input('password', $this->twig->translation('register.password'), ['type' => 'password']); ?>
            <?= $form->input('password_verif', $this->twig->translation('register.password.verif'), ['type' => 'password']); ?>
            <?= $form->submit($this->twig->translation('register.register')); ?>
        </form>
    </div>
</div>
