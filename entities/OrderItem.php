<?php

namespace App\entities;

class OrderItem extends Entity
{
    public $ID;
    public $idOrder;
    public $idGoods;
    public $fPrice;
    public $nCount;
}