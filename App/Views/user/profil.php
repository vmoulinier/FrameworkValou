<h2 class="center"><?= $this->translation('profil.title') ?></h2>
<br />
<p><?= $this->translation('profil.infos.name', ['name' =>  $user->getName()]) ?></p>
<p><?= $this->translation('profil.infos.email', ['email' =>  $user->getEmail()]) ?></p>
<?php if($user->getType() === 'ROLE_ADMIN'): ?>
    <p><?= $this->translation('profil.infos.admin') ?></p>
<?php endif; ?>
