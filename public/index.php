<?php

namespace App\services;
use App\modules as mod;
use Autoload;

include dirname(__DIR__) . '\services\Autoload.php';

spl_autoload_register([new Autoload(), 'loadClass']);

$good = new mod\Good();

$good->fillData([
    'sArticle' => '1112',
    'sDescription' => 'test desc',
    'sImage' => 'test.jpg',
    'sThumb' => 'test_thumb.jpg',
    'fPrice' => 1.25,
]);

//
//
//$cart = new mod\Cart();
//
//$cart->fillData([
//    'idGoods' => '1122',
//    'nCount' => '5',
//    'idUser' => '12345',
//    'sSessionId' => '10',
//    'sStatusId' => '10',
//]);
//
//$cart->insert();
//
//$user = new mod\User();
//
//$user->fillData([
//    'sLogin' => 'Login',
//    'sPassword' => 'Password',
//    'sName' => 'Test Name',
//    'sGroup' => 'Test Group',
//    'sSessionId' => '',
//    'sHash' => '',
//]);
//
//$user->insert();
//
//$userOrder = new mod\UserOrder();
//$userOrder->fillData([
//    'idUser' => 111,
//    'sNumber' => '123',
//    'sStatusId' => 'NEW',
//]);
//
//$userOrder->insert();