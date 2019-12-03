<?php

namespace App\modules;

class User extends Model
{
    protected $tableName = 'user';

    protected $fieldSet = [
        'ID' => '',
        'sLogin' => '',
        'sPassword' => '',
        'sName' => '',
        'sGroup' => '',
        'sSessionId' => '',
        'sHash' => '',
    ];

    public function getTableName(): string
    {
        return $this->tableName;
    }
}