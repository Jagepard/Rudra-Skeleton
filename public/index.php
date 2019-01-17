<?php

use Symfony\Component\Yaml\Yaml;

session_name("RudraFramework");

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

rudra()->setConfig(Yaml::parse(file_get_contents('../app/config.yml')));
rudra()->addConfig('url', rudra()->getServer('REQUEST_SCHEME') . "://" . rudra()->getServer('SERVER_NAME'));
rudra()->setServices(require_once '../app/services.php'); // Set Services
rudra()->get('debugbar')['time']->startMeasure('Index', 'Index');
rudra()->get('route')->run();
