<?php


namespace App\controllers;

use App\main\App;
use App\services\Auth;
use App\services\Request;

abstract class Controller
{

    protected $templateName;
    protected $className;
    protected $requestParams;
    protected $getData;
    protected $postData;
    protected $jsonPostData;
    protected $auth;

    abstract function defaultAction();

    protected $twig;

    public function __construct()
    {
        $this->twig = App::call()->render;
        $this->requestParams = App::call()->request;
        $this->getData = $this->requestParams->getGetParams();
        $this->postData = $this->requestParams->getPostData();
        $this->jsonPostData = $this->requestParams->getJsonPostData();
        $this->auth = App::call()->auth;
    }

    public function run()
    {
        $actionName = App::call()->request->getAction();

        if (empty($actionName)) {
            return $this->defaultAction();
        } else {

            $method = $actionName . 'Action';

            if (method_exists($this, $method)) {
                return $this->$method();
            }
            return $this->twig->render('404', []);
        }
    }

    public function render($templateName, $params = [])
    {
        if (App::call()->auth->getUserName()) {
            $params['userGroup'] = App::call()->auth->getUserGroup();
            $params['userName'] = App::call()->auth->getUserName();
        }
        $params['cartSum'] = App::call()->cartRepository->getCartSum();
        echo $this->twig->render($templateName, $params);
    }
}