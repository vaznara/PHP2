<?php

namespace App\services;

use App\traits\TSingleton;
use PDO;

class DB
{

    private $config = [];

    private $connect; // Переменная для хранения подключения

    public function __construct($config)
    {
        $this->config = $config;
    }

    private function getConnection() // Метод для получения подключения
    {
        if (empty($this->connect)) {
            $this->connect = new PDO(
                $this->getPreparedDsnString(),
                $this->config['username'],
                $this->config['password']
            );
            $this->connect->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        }
        return $this->connect;
    }

    private function getPreparedDsnString() // Метод для подготовки строки подключения
    {
        return sprintf('%s:host=%s;dbname=%s;charset=%s',
            $this->config['driver'],
            $this->config['host'],
            $this->config['db'],
            $this->config['charset']
        );
    }

    protected function query($sql, $params = []) // Метод для подготовки SQL запроса
    {
        $PDOStatement = $this->getConnection()->prepare($sql);
        $PDOStatement->execute($params);
//        var_dump($PDOStatement->errorInfo(), $params, $sql);
        return $PDOStatement;
    }

    public function getObject(string $sql, $class, $params = [])
    {
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetch();
    }

    public function getObjects(string $sql, $class, $params = [])
    {
        $PDOStatement = $this->query($sql, $params);
        $PDOStatement->setFetchMode(\PDO::FETCH_CLASS, $class);
        return $PDOStatement->fetchAll();
    }

    public function find($sql, $className, $params = []) // Запрос К ДБ для получения одной записи
    {
        return $this->query($sql, $params)->fetch();
    }

    public function findAll($sql, $params = []) // Запрос К ДБ для получения множество записей
    {
        return $this->query($sql, $params)->fetchAll();
    }

    public function sqlRequest($sql, $params = [])
    {
        return $this->query($sql, $params);
    }

    public function getLastId()
    {
        return $this->getConnection()->lastInsertId();
    }
}