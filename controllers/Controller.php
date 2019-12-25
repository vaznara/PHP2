<?php


namespace App\controllers;



use App\services\Request;

abstract class Controller
{

    protected $defaultAction;
    protected $templateName;
    protected $className;

    protected $requestParams;
    protected $getData;
    protected $postData;
    protected $jsonPostData;
    protected $sessionId;

    abstract function getTemplateName();
    abstract function defaultAction();

    abstract function getClassName();

    protected $twig;

    public function __construct($renderer)
    {
        $this->twig = $renderer;


//        $defaultAction = $this->getDefaultAction();
        $templateName = $this->getTemplateName();
        $className = $this->getClassName();

        $this->requestParams = new Request();
        $this->getData = $this->requestParams->getGetParams();
        $this->postData = $this->requestParams->getPostData();
        $this->jsonPostData = $this->requestParams->getJsonPostData();
        $this->sessionId = $this->requestParams->getSessionId();
    }

    public function run()
    {

        $actionName = $this->requestParams->getAction();

        if (empty($actionName)) {
            $actionName = $this->defaultAction();
        } else {

        $defaultAction = $this->getDefaultAction();
        $templateName = $this->getTemplateName();
        $className = $this->getClassName();
    }

    public function run($actionName)
    {

        if (empty($actionName)) {
            $actionName = $this->defaultAction;
        }


        $method = $actionName . 'Action';

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        return '404 - Страница не найдена';

        }
    }

//    public function defaultAction()
//    {
//        $getAll = (new $this->className())->getAll();
//        $this->render($this->templateName . 's', [$this->templateName . 's' => $getAll]);
//    }

    public function oneAction()
    {

        if(key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
        } else {
            return '404 - Страница не найдена';
        }

        $getOne = (new $this->className())->getOne($getParam);
        $this->render($this->templateName, [$this->templateName => $getOne]);

    }

    public function allAction()
    {
        $getAll = (new $this->className())->getAll();
        return $this->render($this->templateName . 's', [$this->templateName . 's' => $getAll]);
    }

    public function oneAction()
    {
        $getOne = (new $this->className())->getOne($_GET['id']);
        return $this->render($this->templateName, [$this->templateName => $getOne]);

    }

    public function addAction()
    {
        $addObject = new $this->className();

        $postDataFill = [];

        foreach ($this->postData as $key => $value) {
            $postDataFill[$key] = $value;
        }

        $addObject->fillData($postDataFill);

        $postData = $_POST;

        foreach ($_POST as $key => $value) {
            $postData[$key] = $value;
        }

        $addObject->fillData($postData);

        $addObject->save();
    }

    public function updateAction()
    {

        if(key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
        } else {
            return '404 - Страница не найдена';
        }

        $updateData = (new $this->className())->getOne($getParam);
        $this->render($this->templateName . 'Update', [$this->templateName . 'Update' => $updateData]);
    }

    public function saveAction()
    {
        $saveObject = new $this->className();
        $postDataFill = [];

        if(key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
        } else {
            return '404 - Страница не найдена';
        }

        $postDataFill['ID'] = $getParam;

        foreach ($this->postData as $key => $value) {
            $postDataFill[$key] = $value;
        }

        $saveObject->save($postDataFill);
    }

    public function render($templateName, $params = [])
    {
        echo $this->twig->render($templateName, $params);
    }
}