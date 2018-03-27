<h2 class="center">Page Login</h2>

<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <form method="post">
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->submit('Se connecter !'); ?>
        </form>
    </div>
</div>
<p class="center red bold"><?php echo $error; ?></p>
