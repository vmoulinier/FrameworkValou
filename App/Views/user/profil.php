<h2 class="center"><?= $this->twig->translation('profil.title') ?></h2>
<br />
<p><?= $this->twig->translation('profil.infos.name', ['name' =>  $user->getName()]) ?></p>
<p><?= $this->twig->translation('profil.infos.email', ['email' =>  $user->getEmail()]) ?></p>
<?php if($user->getType() === 'ROLE_ADMIN'): ?>
    <p><?= $this->twig->translation('profil.infos.admin') ?></p>
<?php endif; ?>
