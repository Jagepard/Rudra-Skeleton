<?php

session_name("RudraFramework");

require '../vendor/autoload.php';

(new Whoops\Run)->pushHandler(new Whoops\Handler\PrettyPageHandler)->register();

rudra()->setConfig(file_exists('../app/config.php') ? require_once '../app/config.php'
    : Symfony\Component\Yaml\Yaml::parse(file_get_contents('../app/config.yml')));

rudra()->addConfig('url', (rudra()->getServer('REQUEST_SCHEME') ?? "http") . "://" . rudra()->getServer('HTTP_HOST'));
rudra()->setServices(require_once '../app/services.php'); // Set Services
rudra()->get('debugbar')['time']->startMeasure('Index', 'Index');
rudra()->get('route')->run();

/*
 * php -S localhost:8000 -t public
 * to run built-in web server
 */
