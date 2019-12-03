<?php

namespace App\modules;

class UserOrder extends Model
{
    protected $tableName = 'userorder';

    public function getTableName(): string
    {
        return $this->tableName;
    }
}