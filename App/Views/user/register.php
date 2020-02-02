<h2 class="center"><?= $this->twig->translation('register.title') ?></h2>

<div class="row">
    <div class="col-4 offset-4">
        <form method="post">
            <?= $form->input('email', 'Email', ['type' => 'email']); ?>
            <?= $form->input('name', 'Name', ['type' => 'text']); ?>
            <?= $form->input('firstname', 'First Name', ['type' => 'text']); ?>
            <?= $form->input('password', 'Password', ['type' => 'password']); ?>
            <?= $form->input('password_verif', 'Repeat password', ['type' => 'password']); ?>
            <?= $form->submit('Sign up'); ?>
        </form>
    </div>
</div>
<br />
<p class="center<?php if($error[0] == 'C'): ?> green <?php else: ?> red <?php endif ?>bold"><?php echo $error; ?></p>