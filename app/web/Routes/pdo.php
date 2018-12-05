<?php

return [
    'stargate'       => ['LoginController'],
    'stargate::POST' => ['LoginController', 'actionLogin'],
    'logout'         => ['LoginController', 'actionLogout']
];