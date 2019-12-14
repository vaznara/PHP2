<?php

namespace App\modules;

class Good extends Model
{

    protected $tableName = 'goods';

    protected $fieldSet = [
        'ID' => '',
        'sArticle' => '',
        'sDescription' => '',
        'sImage' => '',
        'sThumb' => '',
        'fPrice' => '',
    ];

    public function getTableName(): string
    {
        return $this->tableName;
    }
}