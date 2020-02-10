<?php require_once 'App/Views/templates/partials/header.php'; ?>

<body>
<?php require_once 'App/Views/templates/partials/navbar.php'; ?>
<div class="container">
    <?php if($flashBag): ?>
        <?php require_once 'App/Views/templates/partials/flashbag.php'; ?>
    <?php endif; ?>
    <?= $content; ?>
</div>
</body>
