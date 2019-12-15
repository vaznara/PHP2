<?php

namespace App\services;
namespace App\controllers;

session_start();

include dirname(__DIR__) . '\services\Autoload.php';
spl_autoload_register([new \Autoload(), 'loadClass']);

$controllerName = (!empty($_GET['c'])) ? $_GET['c'] : 'user';
$actionName = (!empty($_GET['a'])) ? $_GET['a'] : '';


$controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

if (class_exists($controllerClass)) {
    $controller = new $controllerClass;
    echo $controller->run($actionName);
}