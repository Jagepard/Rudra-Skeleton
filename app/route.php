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
        $this->route('auth', $this->container()->config('database', 'active'));
        $this->route('web', $this->container()->config('database', 'active'));

//        $this->collect(
//            $this->container()->config('namespaces'),
//            $this->container()->config('database', 'active')
//        );
        $this->handleException();
    }
}