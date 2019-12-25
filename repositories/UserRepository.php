<?php


namespace App\repositories;
use App\entities\User;

class UserRepository extends Repository
{
    protected $tableName = 'user'; // Имя таблицы в БД

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getEntityClass(): string {
        return User::class;
    }

    public function getByLogin($login)
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE sLogin = :sLogin";
        return $this->db->getObject($sql, $this->getEntityClass(), [':sLogin' => $login]);
    }
}