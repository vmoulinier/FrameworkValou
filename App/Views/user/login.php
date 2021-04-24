<h2 class="center"><?= $this->translation('login.title') ?></h2>
<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', $this->translation('login.email'), ['type' => 'email']); ?>
            <?= $form->input('password', $this->translation('login.password'), ['type' => 'password']); ?>
            <?= $form->submit($this->translation('login.login')); ?>
        </form>
        <a href="<?= $this->url('user_login', ['fb' => 'loginfb']) ?>" class="btn btn-social btn-facebook">
            <span class="fa fa-facebook"></span>
            <?= $this->translation('login.facebook') ?>
        </a>
    </div>
</div>
