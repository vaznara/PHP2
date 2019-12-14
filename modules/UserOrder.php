<?php

namespace App\modules;

class UserOrder extends Model
{
    protected $tableName = 'userorder';

    protected $fieldSet = [
        'ID' => '',
        'idUser' => '',
        'sNumber' => '',
        'sStatusId' => '',
    ];

    public function getTableName(): string
    {
        return $this->tableName;
    }
}