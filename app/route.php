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
//        $this->route('auth', config('database', 'active'));
//        $this->route('web', config('database', 'active'));
        $this->collect(config('namespaces'), config('database', 'active'));
        $this->handleException();
    }
}
