<?php


namespace App\controllers;
use App\modules\User;
use App\main\App;

class CatalogController extends Controller
{
    protected $templateName = 'catalog';

    public function defaultAction()
    {
        $getAll = App::call()->catalogRepository->getAll();
        $this->render($this->templateName, [$this->templateName => $getAll]);
    }

    public function viewAction()
    {
        if (key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
            $getOne = App::call()->catalogRepository->getOne($getParam);
            $this->render($this->templateName . 'View', [$this->templateName => $getOne]);
        } else {
            $this->render('404', []);
        }
    }
}