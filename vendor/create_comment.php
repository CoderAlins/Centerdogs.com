<?php
/*Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)*/
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', 'root');
define('DATABASE', 'vet_db');

/*Подключаемся к базе данных с помощью функции mysqli_connect()*/
$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);

/*Делаем проверку соединения
 * Если есть ошибки, останавливаем код и выводим сообщение с ошибкой*/
if (!$connect) {
    die('Error connect to database!');
}

/*Создаем переменные со значениями, которые были получены с $_POST*/
$id = $_POST['id'];
$body = $_POST['body'];

/*Делаем запрос на добавление новой строки в таблицу comments*/
mysqli_query($connect, "INSERT INTO `comments` (`id`, `message_id`, `body`) VALUES (NULL, '$id', '$body')");