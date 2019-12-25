<?php


namespace App\repositories;
use App\entities\Entity;
use App\main\App;
use App\services\DB;

abstract class Repository
{

    protected $db;
    protected $tableName;

    abstract public function getTableName(): string;
    abstract public function getEntityClass(): string;

    public function __construct()
    {
        $this->db = App::call()->DB;
        $tableName = $this->getTableName();
    }

    public function getOne($id) // Возвращает одну запись из таблицы
    {
        $sql = "SELECT * FROM {$this->getTableName()} WHERE ID = :ID";
        return $this->db->getObject($sql, $this->getEntityClass(), [':ID' => $id]);
    }

    public function getAll() // Возвращает все записи из таблицы
    {
        $sql = "SELECT * FROM {$this->getTableName()}";
        return $this->db->getObjects($sql, $this->getEntityClass());
    }

    protected function insert(Entity $entity) // Метод для добавления записи
    {
        $tableColumns = [];
        $fieldValues = [];

        foreach ($entity as $property => $value) {
            if (empty($value)) {
                continue;
            }

            $tableColumns[] = $property;
            $fieldValues[$property] = $value;
        }

        $values = ':' . implode(', :', array_keys($fieldValues));
        $keys = implode(', ', array_keys($fieldValues));

        $sql = "INSERT INTO {$this->getTableName()} ($keys) VALUES ($values)";
        $this->db->sqlRequest($sql, $fieldValues);
        $entity->ID = $this->db->getLastId();
        return $entity->ID;
    }

    protected function update(Entity $entity) // Метод для обновления записи
    {

        $sql = "UPDATE {$this->getTableName()} SET ";
        $params = [':ID' => $entity->ID];

        foreach ($entity as $key => $value) {
            if ($key == 'ID') {
                continue;
            }

            $sql .= " " . $key . " = :" . $key . ',';
            $params[':' . $key] = $value;
        }

        $sql = trim($sql, ',');
        $sql .= " WHERE ID = :ID";
        return $this->db->sqlRequest($sql, $params);
    }

    public function save(Entity $entity) // Метод INSERT / UPDATE
    {
        if (!$entity->ID) {
            return $this->insert($entity);
        } else {
            $this->update($entity);
        }
    }

    public function delete(Entity $entity) // Метод для удаления одной записи из таблицы
    {
        $sql = "DELETE FROM {$this->getTableName()} WHERE ID = :ID";
        return $this->db->sqlRequest($sql, [':ID' => $entity->ID]);
    }
}