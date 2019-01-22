<?php

namespace App\Web;

use Rudra\Controller;
use App\Common\HttpErrors;
use App\Common\TwigFunctions;
use App\Auth\Models\PDO\Users as PDO;
use DebugBar\DataCollector\ConfigCollector;
use DebugBar\DataCollector\MessagesCollector;
use Rudra\Interfaces\ContainerInterface;

class WebController extends Controller
{

    use HttpErrors;
    use TwigFunctions;

    public function init()
    {
        $this->template(config('template', 'web'));
        rudra()->get('debugbar')['time']->startMeasure('Controller', 'Controller');
        $this->checkCookie();

        $this->setData('title', 'Rudra Framework');
        $this->setData('user', PDO::user());
    }

    public function twig(string $template, array $params = []): void
    {
        rudra()->get('debugbar')->addCollector(new ConfigCollector($params));
        rudra()->get('debugbar')->addCollector(new MessagesCollector('Twig'));
        rudra()->get('debugbar')['Twig']->info($template);

        parent::twig($template, $params);
    }
}
