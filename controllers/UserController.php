<?php


namespace App\controllers;


use App\modules\User;

class UserController extends Controller
{

    protected $defaultAction = 'all';
    protected $templateName = 'user';
    protected $className = 'App\\modules\\User';

    public function getTemplateName() {
        return $this->templateName;
    }

    public function getDefaultAction() {
        return $this->defaultAction;
    }

    public function getClassName()
    {
        return $this->className;
    }
}