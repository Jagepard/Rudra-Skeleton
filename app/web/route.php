<?php

namespace App\Web;

use Rudra\Router;

class Route
{

    /**
     * @param Router $router
     * @param        $namespace
     * @param        $params
     */
    public function run(Router $router, $namespace, $params)
    {
        $router->setNamespace($namespace);
        $router->annotationCollector($params);
    }
}
