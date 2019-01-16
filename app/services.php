<?php

use Rudra\Interfaces\ContainerInterface;

return [
    'contracts' => [
        ContainerInterface::class => rudra(),
        Swift_Transport::class    => (new Swift_SmtpTransport('smtp.yandex.com', 465, 'ssl'))
            ->setUsername(config('swiftmailer', 'username'))
            ->setPassword(config('swiftmailer', 'password'))
    ],

    'services' => [
        'debugbar'         => ['DebugBar\StandardDebugBar'],
        'annotation'       => ['Rudra\Annotation'],
        'validation'       => ['Rudra\Validation'],
        'auth'             => ['Rudra\Auth', [config('env'), config('role')]],
        'redirect'         => ['Rudra\Redirect', [config('url'), config('env')]],
        'connector'        => ['Rudra\Connector', [config('database', config('database', 'active'))]],
        'router'           => ['Rudra\Router', [config('namespaces', 'web')]],
        'route'            => ['App\Route'],
        'event.dispatcher' => ['Rudra\EventDispatcher'],
        'mailer'           => ['\Swift_Mailer']
    ]
];
