<?php

namespace App\modules;

class Catalog extends Model
{

    protected $tableName = 'goods';

    public $ID;
    public $sArticle;
    public $sName;
    public $sDescription;
    public $sImage;
    public $sThumb;
    public $fPrice;

    public function getTableName(): string
    {
        return $this->tableName;
    }
}