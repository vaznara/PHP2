<?php

class Autoload
{
    public function loadClass($className)
    {
        $file = dirname(__DIR__) . str_replace('App', '', $className) . '.php';

        if (file_exists($file)) {
            include $file;
        } else {
            die('Ошибка! Класс <span style="color: red;">' . $className . '</span> не найден!');
        }
    }
}