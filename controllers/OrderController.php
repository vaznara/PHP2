<?php


namespace App\controllers;
use App\entities\Entity;
use App\main\App;

class OrderController extends Controller
{

    protected $templateName = 'orders';

    public function defaultAction()
    {
        $getAll = App::call()->orderRepository->getAll();
        $getStatuses = App::call()->orderRepository->getAllStatuses();
        $this->render($this->templateName, ['statuses' => $getStatuses, $this->templateName => $getAll]);
    }

    public function viewAction()
    {
        if (key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
            $getOne = App::call()->orderItemRepository->getOne($getParam);
            $this->render($this->templateName . 'View', ['orderid' => $getParam, $this->templateName => $getOne]);
        } else {
            $this->render('404', []);
        }
    }

    public function updatestatusAction()
    {
        if (key_exists('id', $this->getData)) {
            $getParam = (int)$this->getData['id'];
        } else {
            return $this->render('404', []);
        }

        $getOne = App::call()->orderRepository->getOne($getParam);
        $getOne->sStatusId = $this->postData['status'];
        var_dump($getOne);
        App::call()->orderRepository->save($getOne);
        return header("Location: /order/");
    }
}