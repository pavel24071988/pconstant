<?php

$host = 'хост';
$dbname = 'имя базы данных';
$user = 'пользователь базы данных';
$password = 'пароль к базе данных';

try {
    //$db = new PDO("mysql:host=localhost;dbname=potolki", "root", "12345");
    //$db = new PDO("mysql:host=localhost;dbname=potolki", "root", "12345");
    $db = new PDO("mysql:host=localhost;dbname=chistoporu", "chistoporu", "qwe123poi098");
    //$db = new PDO("mysql:host=localhost;dbname=chistoporu_new", "chistoporu_new", "qwe123poi098");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->exec("set names utf8");
}catch(Exception $e){
    echo('Проблема коннекта к БД');
    exit;
}

$URI = explode('/', $_SERVER['REQUEST_URI']);

?>