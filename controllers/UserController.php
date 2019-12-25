<?php


namespace App\controllers;
use App\main\App;
use App\modules\User;

class UserController extends Controller
{

    protected $templateName = 'users';

    public function defaultAction()
    {
        $getAll = App::call()->userRepository->getAll();
        $this->render($this->templateName, [$this->templateName => $getAll]);
    }

    public function viewAction()
    {
        if(key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
            $getOne = App::call()->userRepository->getOne($getParam);
            $this->render($this->templateName . 'View', [$this->templateName => $getOne]);
        } else {
            $this->render('404', []);
        }
    }
}