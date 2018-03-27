<h2 class="center">Page Profil</h2>
<br />
<p>Bonjour <?= $user->getNom(); ?> !</p>
<p>Votre email est : <?= $user->getEmail(); ?> </p>
<?php if($user->getType() == 'ROLE_ADMIN'): ?>
    <p>Vous êtes administrateur d'un groupe.</p>
<?php else: ?>
    <p>Vous n'êtes pas administrateur d'un groupe.</p>
<?php endif; ?>
