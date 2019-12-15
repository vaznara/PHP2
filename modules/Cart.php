<?php

namespace App\modules;

class Cart extends Model
{

    protected $tableName = 'cart';

    public $ID;
    public $idGoods;
    public $nCount;
    public $idUser;
    public $sSessionId;
    public $sStatusId;

    public function getTableName(): string
    {
        return $this->tableName;
    }
}