<?php


namespace App\controllers;


class MainController extends Controller
{

    protected $templateName = 'main_page';

    public function defaultAction()
    {
        $this->render($this->templateName, []);
    }

    public function getTemplateName()
    {
    }

    public function getClassName()
    {
    }
}