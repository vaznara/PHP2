<?php

namespace App\modules;

class UserOrder extends Model
{
    protected $tableName = 'userorder';

    protected $ID;
    protected $idUser;
    protected $sNumber;
    protected $sStatusId;

    public function getTableName(): string
    {
        return $this->tableName;
    }
}