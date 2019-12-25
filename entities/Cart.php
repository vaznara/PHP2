<?php


namespace App\entities;

class Cart extends Entity
{
    public $ID;
    public $idGoods;
    public $nCount;
    public $fPrice;
    public $idUser;
    public $sSessionId;
    public $sStatusId;
}