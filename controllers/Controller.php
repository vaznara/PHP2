<?php


namespace App\controllers;


abstract class Controller
{

    protected $defaultAction;
    protected $templateName;
    protected $className;

    abstract function getTemplateName();
    abstract function getDefaultAction();
    abstract function getClassName();

    protected $twig;

    public function __construct($renderer)
    {
        $this->twig = $renderer;
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
        $postData = $_POST;

        foreach ($_POST as $key => $value) {
            $postData[$key] = $value;
        }

        $addObject->fillData($postData);
        $addObject->save();
    }

    public function updateAction()
    {
        if (isset($_GET['id'])) {
            $updateData = (new $this->className())->getOne($_GET['id']);
        } else {
            return false;
        }
        return $this->render($this->templateName . 'Update', [$this->templateName . 'Update' => $updateData]);
    }

    public function saveAction()
    {
        $saveObject = new $this->className();
        $postData = $_POST;
        $postData['ID'] = $_GET['id'];

        foreach ($_POST as $key => $value) {
            $postData[$key] = $value;
        }

        $saveObject->save($postData);
    }

    public function render($templateName, $params = [])
    {
        echo $this->twig->render($templateName, $params);
    }
}