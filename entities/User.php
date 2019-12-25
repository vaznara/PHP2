<?php


namespace App\entities;

class User extends Entity
{
    public $ID;
    public $sLogin;
    public $sPassword;
    public $sName;
    public $sGroup;
    public $sSessionId;
    public $sHash;
}