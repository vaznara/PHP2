<?php
namespace App\modules;
use App\main\App;
//session_start();
require dirname(__DIR__) . '/vendor/autoload.php'; // Подключам автозагрузчик
$config = include dirname(__DIR__) . '/main/config.php'; // Подключаем конфиг файл

App::call()->run($config); // Запускаем приложение