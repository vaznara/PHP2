<?php

namespace App\modules;

class Cart extends Model
{
    protected $tableName = 'cart';

    public function getTableName(): string
    {
        return $this->tableName;
    }
}