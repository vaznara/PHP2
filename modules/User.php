<?php

namespace App\modules;

class User extends Model
{
    protected $tableName = 'user';

    public $ID;
    public $sLogin;
    public $sPassword;
    public $sName;
    public $sGroup;
    public $sSessionId;
    public $sHash;

    public function getTableName(): string
    {
        return $this->tableName;
    }
}