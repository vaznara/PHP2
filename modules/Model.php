<?php

namespace App\modules;
use App\services\DB;

/**
 * Class Model
 * @var DB
 */

abstract class Model
{

    protected $db;

    abstract public function getTableName(): string;

    public function __construct(DB $db) // Принимает только экземпляр класса DB.
    {
        $this->db = $db;
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        return $this->db->find($sql);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();

        $sql = "SELECT * FROM {$tableName}";
        return $this->db->findAll($sql);
    }

}