<?php

namespace App\modules;

use App\services\DB;

/**
 * Class Model
 * Class DB
 * @var DB
 * use DB
 */

abstract class Model
{

    protected $db;
    protected $tableName;

    abstract public function getTableName(): string;

    public function __construct()
    {
        $this->db = DB::getInstance();
        $tableName = $this->getTableName();
    }

    public function fillData($data) // Заполняет свойства экземпляра класса
    {
        foreach ($data as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getOne($id) // Возвращает одну запись из таблицы
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE ID = :ID";
        return $this->db->getObject($sql, static::class, [':ID' => $id]);
    }

    public function getAll() // Возвращает все записи из таблицы
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->getObjects($sql, static::class);
    }

    private function insert() // Метод для добавления записи
    {
        $tableColumns = [];
        $fieldValues = [];

        foreach ($this as $property => $value) {
            if ($property == 'db' || empty($value) || $property == 'tableName') {
                continue;
            }

            $tableColumns[] = $property;
            $fieldValues[$property] = $value;
        }

        $values = ':' . implode(', :', array_keys($fieldValues));
        $keys = implode(', ', array_keys($fieldValues));

        $sql = "INSERT INTO {$this->tableName} ($keys) VALUES ($values)";
        $this->db->sqlRequest($sql, $fieldValues);

        $this->ID = $this->db->getLastId();
    }

    private function update($params) // Метод для обновления записи
    {

        $sql = "UPDATE {$this->tableName} SET ";

        foreach ($params as $key => $value) {
            if ($key == 'ID') {
                continue;
            }

            $sql .= " " . $key . " = :" . $key . ',';
        }

        $sql = trim($sql, ',');
        $sql .= " WHERE ID = :ID";

        return $this->db->sqlRequest($sql, $params);
    }

    public function save($params = []) // Метод INSERT / UPDATE
    {
        if ($params == []) {
            $this->insert();
        } else {
            $this->update($params);
        }
    }

    public function delete($id) // Метод для удаления одной записи из таблицы
    {
        $sql = "DELETE FROM {$this->tableName} WHERE ID = :ID";
        return $this->db->sqlRequest($sql, [':ID' => $id]);
    }
}