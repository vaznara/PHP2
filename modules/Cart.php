<?php

namespace App\modules;

use App\services\Request;

class Cart extends Model
{

    protected $tableName = 'cartitem';
    protected $tableViewName = 'cart';

    public $ID;
    public $idGoods;
    public $nCount;
    public $idUser;
    public $sSessionId;
    public $sStatusId;

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getSessionId() {
        $params = new Request();
        return $params->getSessionId();
    }

    public function getAll() // Возвращает все записи из таблицы
    {
        $sql = "SELECT * FROM {$this->tableViewName} WHERE sSessionId = '{$this->getSessionId()}'";
        return $this->db->getObjects($sql, static::class);
    }
}