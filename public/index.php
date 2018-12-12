<?php

use Rudra\URI;
use Rudra\Container;
use Symfony\Component\Yaml\Yaml;

session_name("RudraFramework");

require '../vendor/autoload.php';

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

$rudra = Container::app();
$rudra->setConfig(Yaml::parse(file_get_contents( '../app/config.yml')));
$rudra->new( URI::class, ['container' => $rudra, 'env' => $rudra->config('env'), 'url' => $rudra->config('url')]);  // Set APP_URL & PROTOCOL
$rudra->setServices(require_once '../app/services.php'); // Set Services
$rudra->get('debugbar')['time']->startMeasure('Index', 'Index');
$rudra->get('route')->run();
