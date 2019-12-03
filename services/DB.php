<?php

namespace App\services;

class DB
{
    public function find(string $sql)
    {
        return $sql . ' // find';
    }

    public function findAll(string $sql)
    {
        return $sql . ' // findAll';
    }
}