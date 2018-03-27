<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>MyTek</title>
    <link href="<?= PATH ?>/Public/css/bootstrap.css" rel="stylesheet">
    <link href="<?= PATH ?>/Public/css/styles.css?v=<?=time();?>" rel="stylesheet">
    <script src="<?= PATH ?>/Public/js/jquery-2.2.4.js"></script>
    <script src="<?= PATH ?>/Public/js/bootstrap.js"></script>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default" style="margin-top: 20px">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?= PATH ?>/home/index">Accueil</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <?php if(\App\Model\UserRepository::logged()): ?>
                        <li><a href="<?= PATH ?>/recherche/index">Rechercher</a></li>
                    <?php endif ?>
                    <?php if(\App\Model\UserRepository::logged()): ?>
                        <?php if(\App\Model\UserRepository::getCurrentUser()->getGroupe()): ?>
                            <li><a href="<?= PATH ?>/groupes/index">Groupes</a></li>
                        <?php endif; ?>
                    <?php endif ?>
                    <?php if(\App\Model\UserRepository::logged()): ?>
                        <li><a href="<?= PATH ?>/mediatheque/index">Ma médiathèque</a></li>
                    <?php endif ?>
                    <?php if(\App\Model\UserRepository::loggedAdmin()): ?>
                        <li><a href="<?= PATH ?>/admin/index">Admin</a></li>
                    <?php endif ?>
                    <?php if(\App\Model\UserRepository::logged()): ?>
                        <li><a href="<?= PATH ?>/user/profil">Profil</a></li>
                    <?php endif ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php if(\App\Model\UserRepository::logged()): ?>
                        <li><a href="<?= PATH ?>/user/logout">Deconnexion</a></li>
                    <?php else: ?>
                        <li><a href="<?= PATH ?>/user/register">S'enregistrer</a></li>
                        <li><a href="<?= PATH ?>/user/login">Connexion</a></li>
                    <?php endif ?>
                </ul>
            </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
    </nav>
    <br >
    <?php echo $content; ?>
</div>
</body>
