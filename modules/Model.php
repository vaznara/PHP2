<?php

namespace App\modules;
use App\services\DB;

/**
 * Class Model
 * @var DB
 * use DB
 */

abstract class Model
{

    protected $db;
    protected $tableName;

    abstract public function getTableName(): string;

    public function __construct() // Принимает только экземпляр класса DB.
    {
        $this->db = DB::getInstance();
        $tableName = $this->getTableName();
    }

    public function getFieldsToInsert() // Возвращает список полей таблицы соответствующего класса
    {
        return $this->fieldSet;
    }

    public function fillData($params) // Принимает массив со значениями для заполнения данных в эгземпляре класса.
    {
        foreach ($params as $key => $item) {
            $this->fieldSet[$key] = $item;
        }
        return $this->fieldSet;
    }

    public function getOne($id) // Возвращает одну запись из таблицы
    {
        $sql = "SELECT * FROM {$this->tableName} WHERE ID = :ID";
        return $this->db->find($sql, [':ID' => $id], static::class);
    }

    public function getAll() // // Возвращает все записи из таблицы
    {
        $sql = "SELECT * FROM {$this->tableName}";
        return $this->db->findAll($sql, static::class);
    }

    private function insert() // Метод для длбавления записи
    {
        $fieldsArray = $this->getFieldsToInsert();

        if ($fieldsArray['ID'] == '') {
            unset($fieldsArray['ID']);
        }

        $values = ':' . implode(', :', array_keys($fieldsArray));
        $keys = implode(', ', array_keys($fieldsArray));

        $sql = "INSERT INTO {$this->tableName} ($keys) VALUES ($values)";
        return $this->db->sqlRequest($sql, $fieldsArray);
    }

    private function update($params) // Метод для обновления записи
    {

        $sql = "UPDATE {$this->tableName} SET";

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

    public function save($params = []) { // Метод INSERT / UPDATE
        if($params == []) {
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