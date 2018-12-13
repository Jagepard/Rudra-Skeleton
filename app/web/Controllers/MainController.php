<?php

namespace App\Web\Controllers;

use App\Web\WebController;

class MainController extends WebController
{
    /**
     * @Routing(url = '')
     */
    public function actionIndex()
    {
        $this->sendMail('dankorot@gmail.com');
        $this->twig('index', (array)$this->data());
    }

    protected function sendMail(string $to)
    {
        $message = (new \Swift_Message('Подтвердите почту'))
            ->setFrom(['jagepard@yandex.ru' => 'Администратор сайта ' . $this->container()->config('url')])
            ->setTo([$to])
            ->setBody('Подтвердите почту');

        $this->container()->get('mailer')->send($message);
    }
}
