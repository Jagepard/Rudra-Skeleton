<?php

session_name("RudraFramework");

require '../vendor/autoload.php';

(new Whoops\Run)->pushHandler(new Whoops\Handler\PrettyPageHandler)->register();

rudra()->setConfig(Symfony\Component\Yaml\Yaml::parse(file_get_contents('../app/config.yml')));
rudra()->addConfig('url', rudra()->getServer('REQUEST_SCHEME') . "://" . rudra()->getServer('SERVER_NAME'));
rudra()->setServices(require_once '../app/services.php'); // Set Services
rudra()->get('debugbar')['time']->startMeasure('Index', 'Index');
rudra()->get('route')->run();
