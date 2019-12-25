<?php

namespace App\modules;
use App\services\renderers\TwigRender;
use App\services\Request;

session_start();

require dirname(__DIR__) . '/vendor/autoload.php';

$getRequest = new Request();

$controllerName = empty($getRequest->getController()) ? 'main' : $getRequest->getController();
$actionName = $getRequest->getAction();

$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRender());
    echo $controller->run($actionName);
}