<?php

use Core\Services\Services;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

// replace with file to your own project
require_once 'Core/Services/Services.php';
require_once 'env.php';

$services = new Services();
$entityManager = $services->getDoctrine();

return ConsoleRunner::createHelperSet($entityManager);

//vendor\bin\doctrine orm:schema-tool:update --force --dump-sql
//vendor\bin\doctrine dbal:import data.sql