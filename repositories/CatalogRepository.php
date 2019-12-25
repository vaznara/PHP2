<?php


namespace App\repositories;
use App\entities\Catalog;

class CatalogRepository extends Repository
{
    protected $tableName = 'goods'; // Имя таблицы в БД

    public function getTableName(): string
    {
        return $this->tableName;
    }

    public function getEntityClass(): string {
        return Catalog::class;
    }
}