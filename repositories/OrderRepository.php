<?php

namespace App\repositories;
use App\entities\Order;
use App\main\App;

class OrderRepository extends Repository
{
    protected $tableName = 'userorder';

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getEntityClass(): string {
        return Order::class;
    }

    public function getAll() // Возвращает все записи из таблицы
    {
        $userGroup = App::call()->auth->getUserGroup();

        if ($userGroup == 'adminGroup') {
            $params = [];
            $sql = "SELECT * FROM {$this->tableName} ORDER BY ID DESC";
        } else {
            $params['idUser'] = App::call()->auth->getUserName();
            $sql = "SELECT * FROM {$this->tableName} WHERE idUser = :idUser ORDER BY ID DESC";
        }
        return $this->db->getObjects($sql, $this->getEntityClass(), $params);
    }

    public function getAllStatuses() {
        $sql = "SELECT * FROM orderstatus";
        return $this->db->findAll($sql);
    }
}