<?php

namespace App\repositories;
use App\entities\OrderItem;
use App\main\App;

class OrderItemRepository extends Repository
{
    protected $tableName = 'orderitem';
    protected $tableViewName = 'orders';

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getEntityClass(): string {
        return OrderItem::class;
    }

    public function getOne($id) // Возвращает одну запись из таблицы
    {
        $sql = "SELECT * FROM {$this->tableViewName} WHERE ID = :ID";
        return $this->db->getObjects($sql, $this->getEntityClass(), [':ID' => $id]);
    }

}