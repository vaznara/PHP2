<?php

namespace App\modules;

class Good extends Model
{
    protected $tableName = 'goods';

    public function getTableName(): string
    {
        return $this->tableName;
    }
}