<?php

namespace App;

use Rudra\ExternalTraits\RouteTrait;
use Rudra\ExternalTraits\SetContainerTrait;

class Route
{

    use RouteTrait;
    use SetContainerTrait;

    /**
     * @throws \Rudra\Exceptions\RouterException
     */
    public function run()
    {
        $this->route('auth', 'pdo');
        $this->route('web', 'pdo');

//        $this->collect(
//            $this->container()->config('namespaces'),
//            $this->container()->config('database', 'active')
//        );
        $this->handleException();
    }
}