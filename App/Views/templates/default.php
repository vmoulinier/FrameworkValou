<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title><?= PROJECT_NAME ?></title>
    <link href="<?= PATH ?>/Public/css/bootstrap.css" rel="stylesheet">
    <link href="<?= PATH ?>/Public/css/styles.css?v=<?=time();?>" rel="stylesheet">
    <script src="<?= PATH ?>/Public/js/jquery-3.4.1.js"></script>
    <script src="<?= PATH ?>/Public/js/bootstrap.js"></script>
    <script src="https://kit.fontawesome.com/d92432fce9.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <a class="my-0 mr-md-auto font-weight-normal" href="<?= PATH ?>/home/index"><h5><?= $this->twig->translation('home.index') ?></h5></a>

    <nav class="my-2 my-md-0 mr-md-3">
        <?php if($this->twig->logged()): ?>
            <?php if($this->twig->loggedAdmin()): ?>
                <a class="p-2 text-dark" href="<?= PATH ?>/admin/index"><?= $this->twig->translation('home.admin') ?></a>
            <?php endif ?>
            <a class="p-2 text-dark" href="<?= PATH ?>/user/profil"><?= $this->twig->translation('home.profil') ?></a>
        <?php endif ?>
    </nav>
    <?php if($this->twig->logged()): ?>
        <a class="btn btn-outline-primary mr-1" href="<?= PATH ?>/user/logout"><?= $this->twig->translation('home.logout') ?></a>
    <?php else: ?>
        <a class="btn btn-outline-primary mr-1" href="<?= PATH ?>/user/register"><?= $this->twig->translation('home.signup') ?></a>
        <a class="btn btn-outline-primary mr-1" href="<?= PATH ?>/user/login"><?= $this->twig->translation('home.signin') ?></a>
    <?php endif ?>
    <a class="btn btn-outline-primary" href="<?= PATH ?>/admin/translations"><?= $this->twig->translation('home.translate') ?></a>
</div>

<div class="container">
    <?php echo $content; ?>
</div>
</body>
