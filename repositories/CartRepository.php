<?php

namespace App\repositories;

use App\entities\Cart;
use App\entities\Entity;
use App\main\App;

class CartRepository extends Repository
{

    protected $tableName = 'cartitem';
    protected $tableViewName = 'cart';

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getEntityClass(): string
    {
        return Cart::class;
    }

    public function getUserCart()
    {
        if (App::call()->auth->getUserName()) {
            $params['idUser'] = App::call()->auth->getUserName();
            $sql = "SELECT * FROM {$this->tableViewName} WHERE idUser = :idUser";
        } else {
            $params['sSessionId'] = App::call()->request->getSessionId();
            $sql = "SELECT * FROM {$this->tableViewName} WHERE idUser is Null and sSessionId = :sSessionId";
        }
        return $this->db->getObjects($sql, $this->getEntityClass(), $params);
    }

    public function getCartSum()
    {
        $cartSum = [
            'countSum' => 0,
            'priceSum' => 0,
        ];

        foreach ($this->getUserCart() as $value) {
            $cartSum['countSum'] += $value->nCount;
            $cartSum['priceSum'] += $value->nCount * $value->fPrice;
        }
        return $cartSum;
    }

    public function fillUserCart()
    {
        if(!empty(App::call()->cartRepository->getUserCart())) {
            return false;
        }

        $params = [
            'idUser' => App::call()->auth->getUserName(),
            'sSessionId' => App::call()->request->getSessionId(),
        ];

        $sql = "UPDATE {$this->tableName} SET idUser = :idUser WHERE idUser is Null and sSessionId = :sSessionId";
        return $this->db->sqlRequest($sql, $params);
    }

    protected function update(Entity $entity) // Метод для обновления записи
    {

        $fieldsToSkip = ['sArticle', 'sName', 'sDescription', 'sImage', 'sThumb'];

        $sql = "UPDATE {$this->tableName} SET ";
        $params = [':ID' => $entity->ID];

        foreach ($entity as $key => $value) {
            foreach ($fieldsToSkip as $field) {
                if ($key == $field) {
                    continue 2;
                }
            }

            $sql .= " " . $key . " = :" . $key . ',';
            $params[':' . $key] = $value;
        }

        $sql = trim($sql, ',');
        $sql .= " WHERE ID = :ID";
        return $this->db->sqlRequest($sql, $params);
    }

    public function clearCart()
    {

        if (App::call()->auth->getUserName()) {
            $params = ['idUser' => App::call()->auth->getUserName()];
            $sql = "DELETE FROM {$this->tableName} WHERE idUser = :idUser";
        } else {
            $params = ['sSessionId' => App::call()->request->getSessionId(),];
            $sql = "DELETE FROM {$this->tableName} WHERE sSessionId = :sSessionId";
        }

        return $this->db->sqlRequest($sql, $params);
    }
}