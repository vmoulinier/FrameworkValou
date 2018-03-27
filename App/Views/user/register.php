<h2 class="center">Page Register</h2>

<div class="row">
    <div class="col-sm-4 col-sm-offset-4">
        <form method="post">
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('nom', 'Nom', ['type' => 'text']); ?>
            <?= $form->input('prenom', 'Prenom', ['type' => 'text']); ?>
            <?= $form->input('password', 'Mot de passe', ['type' => 'password']); ?>
            <?= $form->input('password_verif', 'Répeter le mot de passe', ['type' => 'password']); ?>
            <?= $form->submit('S\'enregistrer !'); ?>
        </form>
    </div>
</div>
<br />
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>