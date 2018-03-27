<?php

use Core\Controller\DoctrineORM;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project
require_once 'Core/Controller/DoctrineORM.php';

$orm = new DoctrineORM();
$entityManager = $orm->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);

//vendor\bin\doctrine orm:schema-tool:update --force --dump-sql