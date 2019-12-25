<?php

namespace App\main;

use App\controllers\Controller;
use App\repositories\CartRepository;
use App\repositories\CatalogRepository;
use App\repositories\OrderRepository;
use App\repositories\OrderItemRepository;
use App\repositories\UserRepository;
use App\services\Auth;
use App\services\renderers\TwigRender;
use App\services\Request;
use App\services\DB;
use App\controllers\MainController;
use App\traits\TSingleton;

/**
 * Class App
 * @package App\main
 *
 * @property TwigRender render
 * @property DB DB
 * @property UserRepository userRepository
 * @property CatalogRepository catalogRepository
 * @property CartRepository cartRepository
 * @property OrderRepository orderRepository
 * @property OrderItemRepository orderItemRepository
 * @property Auth auth
 * @property Request request
 */
class App
{
    use TSingleton;

    static public function call(): App
    {
        return static::getInstance();
    }

    protected $config = [];
    private $components = [];

    public function run(array $config)
    {
        $this->config = $config;
        $this->runController();
    }

    protected function runController()
    {
        $getRequest = new Request();

        $controllerName = empty($getRequest->getController()) ? 'main' : $getRequest->getController();
        $actionName = $getRequest->getAction();

        $controllerClass = 'App\\controllers\\' . ucfirst($controllerName) . 'Controller';

        if (class_exists($controllerClass)) {
            $controller = new $controllerClass();
            echo $controller->run($actionName);
        } else {
            $controller = new MainController();
            echo $controller->render('404', []);
        }
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->components)) {
            return $this->components[$name];
        }

        if (!array_key_exists($name, $this->config['components'])) {
            return null;
        }

        $class = $this->config['components'][$name]['class'];

        if (array_key_exists('config', $this->config['components'][$name])) {
            $config = $this->config['components'][$name]['config'];
            $component = new $class($config);
        } else {
            $component = new $class();
        }
        $this->components[$name] = $component;
        return $component;
    }
}