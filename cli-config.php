<?php

use Rudra\Container;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Yaml\Yaml;
use Doctrine\ORM\Tools\Console\ConsoleRunner;

require_once 'vendor/autoload.php';
$rudra = Container::app();
$rudra->setConfig(Yaml::parse(file_get_contents( 'app/config.yml')));

$namespace = 'app/auth/Models/Doctrine';

$conn = $rudra->config('database', 'doctrine');

$config        = Setup::createAnnotationMetadataConfiguration([$rudra->config('bp') . $namespace], true, null, null, false);
$entityManager = EntityManager::create([
    'driver'   => $conn['DSN'],
    'user'     => $conn['user'],
    'password' => $conn['password'],
    'dbname'   => $conn['name'],
], $config);

return ConsoleRunner::createHelperSet($entityManager);

