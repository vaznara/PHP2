<?php

namespace App\services;
use App\modules as mod;

include dirname(__DIR__) . '\services\Autoload.php';

spl_autoload_register([new \Autoload(), 'loadClass']);

$db = new DB();

$good = new mod\Good($db);
$cart = new mod\Cart($db);
$user = new mod\User($db);
$userOrder = new mod\UserOrder($db);

var_dump($good->getOne(1) . ': Table -> ' . $good->getTableName());
var_dump($good->getAll() . ': Table -> ' . $good->getTableName());
echo "<br>";
var_dump($cart->getOne(2) . ': Table -> ' . $cart->getTableName());
var_dump($cart->getAll()  . ': Table -> ' . $cart->getTableName());
echo "<br>";
var_dump($user->getOne(3) . ': Table -> ' . $user->getTableName());
var_dump($user->getAll() . ': Table -> ' . $user->getTableName());
echo "<br>";
var_dump($userOrder->getOne(4) . ': Table -> ' . $userOrder->getTableName());
var_dump($userOrder->getAll() . ': Table -> ' . $userOrder->getTableName());