<?php


namespace App\controllers;


use App\modules\User;

class UserController extends Controller
{

    protected $defaultAction = 'all';
    protected $templateName = 'users';
    protected $className = 'App\\modules\\User';

    public function defaultAction()
    {
        $getAll = (new $this->className())->getAll();
        $this->render($this->templateName, [$this->templateName => $getAll]);
    }

    public function viewAction()
    {
        if(key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
        } else {
            return '404 - Страница не найдена';
        }

        $getOne = (new $this->className())->getOne($getParam);
        $this->render($this->templateName . 'View', [$this->templateName => $getOne]);
    }

    public function getTemplateName() {
        return $this->templateName;
    }

    public function getClassName()
    {
        return $this->className;
    }
}