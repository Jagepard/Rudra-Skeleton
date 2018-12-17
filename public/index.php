<?php

use Rudra\URI;
use Rudra\Container;
use Symfony\Component\Yaml\Yaml;

session_name("RudraFramework");

require '../vendor/autoload.php';

$rudra = Container::app();
$rudra->setConfig(Yaml::parse(file_get_contents('../app/config.yml')));
$rudra->new(URI::class, [ // Set APP_URL & PROTOCOL
    'container' => $rudra,
    'env'       => $rudra->config('env'),
    'url'       => $rudra->config('url')
]);

$rudra->set('transport', (new \Swift_SmtpTransport('smtp.yandex.com', 465, 'ssl'))
    ->setUsername($rudra->config('swiftmailer','username'))
    ->setPassword($rudra->config('swiftmailer','password')), 'raw');

$rudra->setServices(require_once '../app/services.php'); // Set Services

$rudra->get('debugbar')['time']->startMeasure('Index', 'Index');
$rudra->get('route')->run();
