<?php


namespace App\controllers;


use App\modules\User;

class GoodController extends Controller
{

    protected $defaultAction = 'all';
    protected $templateName = 'good';
    protected $className = 'App\\modules\\Good';

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