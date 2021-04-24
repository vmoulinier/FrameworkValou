<h2 class="center"><?= $this->translation('register.title') ?></h2>

<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', $this->translation('register.email'), ['type' => 'email']); ?>
            <?= $form->input('name', $this->translation('register.name'), ['type' => 'text']); ?>
            <?= $form->input('firstname', $this->translation('register.firstname'), ['type' => 'text']); ?>
            <?= $form->input('password', $this->translation('register.password'), ['type' => 'password']); ?>
            <?= $form->input('password_verif', $this->translation('register.password.verif'), ['type' => 'password']); ?>
            <?= $form->submit($this->translation('register.register')); ?>
        </form>
    </div>
</div>
