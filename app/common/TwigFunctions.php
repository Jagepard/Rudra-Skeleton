<?php

namespace App\Common;

use Twig_Environment;
use Twig_SimpleFunction;
use Rudra\Interfaces\ContainerInterface;

trait TwigFunctions
{

    public function template(array $config): void
    {
        parent::template($config);

        $this->twig->addFunction(new Twig_SimpleFunction('d', function ($var) {
            return d($var);
        }));

        $this->twig->addFunction(new Twig_SimpleFunction('date', function ($var) {
            return date($var);
        }));

        $this->twig->addFunction(new Twig_SimpleFunction('auth', function () {
            return rudra()->get('auth')->access(true);
        }));

        $this->twig->addFunction(new Twig_SimpleFunction('active', function ($link, $page) {
            if ($link == $page) {
                echo 'class="active"';
            }
        }));

        $this->twig->addFunction(new Twig_SimpleFunction('value', function ($var) {
            if (rudra()->hasSession('value', $var)) {
                return rudra()->getSession('value', $var);
            }
        }));

        $this->twig->addFunction(new Twig_SimpleFunction('alert', function ($value, $style, $label = null) {
            if (rudra()->hasSession('alert', $value)) {
                return '<div class="alert alert-' . $style . '" style="padding: 15px">' . rudra()->getSession('alert', $value) . $label . '</div>';
            }
        }));

        if ('development' == config('env')) {
            $debugbarRenderer = rudra()->get('debugbar')->getJavascriptRenderer();
            $this->twig->addGlobal('debugbar', $debugbarRenderer);
        }

        $this->twig->addGlobal('env', config('env'));
        $this->twig->addGlobal('url', config('url'));
        $this->twig->addGlobal('container', rudra());
    }
}
