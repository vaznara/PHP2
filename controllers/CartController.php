<?php


namespace App\controllers;

use App\entities\Order;
use App\entities\OrderItem;
use App\main\App;
use App\entities\Cart;

class CartController extends Controller
{

    protected $templateName = 'cart';

    public function defaultAction()
    {
        $this->render($this->templateName, [$this->templateName => App::call()->cartRepository->getUserCart()]);
    }

    public function addAction()
    {
        foreach (App::call()->cartRepository->getUserCart() as $key => $value) {
            if ($value->idGoods == App::call()->request->getJsonPostData()['idGoods']) {
                $value->nCount += App::call()->request->getJsonPostData()['nCount'];
                $value->fPrice = App::call()->request->getJsonPostData()['fPrice'];
                App::call()->cartRepository->save($value);
                return json_encode(App::call()->cartRepository->getCartSum());
            }
        }

        $userCart = new Cart();

        foreach ($this->jsonPostData as $key => $value) {
            $userCart->$key = $value;
            $userCart->sSessionId = App::call()->request->getSessionId();
            if (App::call()->auth->getUserName()) {
                $userCart->idUser = App::call()->auth->getUserName();
            }
        }
        App::call()->cartRepository->save($userCart);
        return json_encode(App::call()->cartRepository->getCartSum());
    }

    public function deleteAction()
    {
        foreach (App::call()->cartRepository->getUserCart() as $value) {
            if ($value->idGoods == $this->getData['id']) {
                App::call()->cartRepository->delete(App::call()->cartRepository->getOne($value->ID));
            }
        }
        return json_encode(App::call()->cartRepository->getCartSum());
    }

    public function orderAction()
    {
        $userOrder = new Order();
        $userOrder->sSessionId = App::call()->request->getSessionId();
        $userOrder->idUser = App::call()->auth->getUserName();
        $orderId = App::call()->orderRepository->save($userOrder);

        $userOrderItem = new OrderItem();
        $userCart = App::call()->cartRepository->getUserCart();

        foreach ($userCart as $value) {
            foreach ($value as $key => $item) {
                if ($key == 'idGoods' || $key == 'nCount' || $key == 'fPrice') {
                    $userOrderItem->ID = '';
                    $userOrderItem->$key = $item;
                }
            }

            $userOrderItem->idOrder = $orderId;
            App::call()->orderItemRepository->save($userOrderItem);
        }

        App::call()->cartRepository->clearCart();
        return json_encode(['id' => $orderId]);
    }
}