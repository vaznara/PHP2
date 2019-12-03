<?php

namespace App\services;

use PDO;

class DB
{

    private $config = [ // Конфигурация подключения
        'driver' => 'mysql',
        'host' => 'localhost',
        'db' => 'php2shop',
        'charset' => 'UTF8',
        'username' => 'php2shop',
        'password' => '123456',
    ];

    private $connect; // Переменная для хранения подключения

    protected function __construct()
    {
    }

    protected function __clone()
    {
    }

    protected function __wakeup()
    {
    }

    private static $items;

    public static function getInstance()
    {
        if(empty(static::$items)) {
            static::$items = new static();
        }
        return static::$items;
    }


    private function getConnection() // Паблик метод для получения подключения
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
        return $PDOStatement;
    }

    public function find($sql, $className, $params = []) // Запрос К ДБ для получения одной записи
    {
        return $this->query($sql, $params)->fetch(PDO::FETCH_CLASS, $className);
    }

    public function findAll($sql, $className, $params = []) // Запрос К ДБ для получения множество записей
    {
        return $this->query($sql, $params)->fetchAll(PDO::FETCH_CLASS, $className);
    }

    public function sqlRequest($sql, $params) {
        return $this->query($sql, $params);
    }
}