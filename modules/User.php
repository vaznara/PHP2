<?php

namespace App\modules;

class User extends Model
{
    protected $tableName = 'user';

    public function getTableName(): string
    {
        return $this->tableName;
    }
}