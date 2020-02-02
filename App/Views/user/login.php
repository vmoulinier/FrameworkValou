<h2 class="center"><?= $this->twig->translation('login.title') ?></h2>
<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->submit('Se connecter !'); ?>
        </form>
    </div>
</div>
<p class="center red bold"><?php echo $error; ?></p>
