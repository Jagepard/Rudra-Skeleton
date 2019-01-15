<?php

use Rudra\Container;
use Rudra\Interfaces\ContainerInterface;

$rudra = Container::$app;

return [
    'contracts' => [
        ContainerInterface::class => Container::$app,
    ],

    'services' => [
        'debugbar'         => ['DebugBar\StandardDebugBar'],
        'annotation'       => ['Rudra\Annotation'],
        'validation'       => ['Rudra\Validation'],
        'auth'             => ['Rudra\Auth', ['env' => $rudra->config('env'), 'role' => $rudra->config('role')]],
        'redirect'         => ['Rudra\Redirect', ['url' => APP_URL, 'env' => $rudra->config('env')]],
        'connector'        => ['Rudra\Connector', ['config' => $rudra->config('database', $rudra->config('database', 'active'))]],
        'router'           => ['Rudra\Router', ['namespace' => $rudra->config('namespaces', 'web')]],
        'route'            => ['App\Route'],
        'event.dispatcher' => ['Rudra\EventDispatcher'],
        'mailer'           => ['\Swift_Mailer', ['transport' => $rudra->get('transport')]]
    ]
];
