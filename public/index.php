<?php

namespace App\modules;
use App\services\renderers\TwigRender;

session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

$controllerName = (!empty($_GET['c'])) ? $_GET['c'] : 'user';
$actionName = (!empty($_GET['a'])) ? $_GET['a'] : '';

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    echo $controller->run($actionName);
}