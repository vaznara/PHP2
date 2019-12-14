<?php

namespace App\modules;

class Cart extends Model
{

    protected $tableName = 'cart';

    protected $fieldSet = [
        'ID' => '',
        'idGoods' => '',
        'nCount' => '',
        'idUser' => '',
        'sSessionId' => '',
        'sStatusId' => '',
    ];

    public function getTableName(): string
    {
        return $this->tableName;
    }
}