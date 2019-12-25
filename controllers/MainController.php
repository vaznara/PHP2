<?php


namespace App\controllers;


use App\modules\Cart;
use App\services\Request;

class MainController extends Controller
{

    protected $templateName = 'main_page';

    public function defaultAction()
    {
        $this->render($this->templateName, []);
    }

}