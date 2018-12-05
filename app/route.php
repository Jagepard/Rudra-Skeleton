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
        $this->route('auth', 'common');
        $this->collect($this->withOut(['auth']), $this->container()->config('database', 'active'));
        $this->handleException();
    }
}