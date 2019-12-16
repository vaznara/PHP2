<?php


namespace App\controllers;

class CartController extends Controller
{

//    protected $defaultAction = 'all';
    protected $templateName = 'cart';
    protected $className = 'App\\modules\\Cart';

    public function defaultAction()
    {
        $getAll = (new $this->className())->getAll($this->requestParams->getSessionId());
        $this->render($this->templateName, [$this->templateName => $getAll]);
    }

    public function getTemplateName()
    {
    }

    public function addAction()
    {

        $addObject = new $this->className();
        $postDataFill = [];

        foreach ($this->jsonPostData as $key => $value) {
            $postDataFill[$key] = $value;
        }

        $postDataFill['sSessionId'] = $this->requestParams->getSessionId();

        $addObject->fillData($postDataFill);
        $addObject->save();
    }

    public function getClassName()
    {
        return $this->className;
    }
}