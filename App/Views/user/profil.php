<h2 class="center">Page Profil</h2>
<br />
<p><?= $this->twig->translation('profil.infos.name', ['name' =>  $user->getNom()]) ?></p>
<p><?= $this->twig->translation('profil.infos.email', ['email' =>  $user->getEmail()]) ?></p>
<?php if($user->getType() == 'ROLE_ADMIN'): ?>
    <p><?= $this->twig->translation('profil.infos.admin') ?></p>
<?php endif; ?>
