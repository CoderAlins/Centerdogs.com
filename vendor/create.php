<?php

//Добавление нового продукта


/*
 * Подключаем файл для получения соединения к базе данных (PhpMyAdmin, MySQL)
 */


/*
 * Создаем переменные со значениями, которые были получены с $_POST
 */
	define('HOST', 'localhost');
    define('USER', 'root');
    define('PASSWORD', 'root');
    define('DATABASE', 'vet_db');
	$connect = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
	if (!$connect) {
    die('Error connect to database!');
	}
$name = $_POST['name'];
$mess = $_POST['mess'];
$email = $_POST['email'];

/*
 * Делаем запрос на добавление новой строки в таблицу message
 */

mysqli_query($connect,"INSERT INTO `message` (`id`, `name`, `email`, `mess`) VALUES (NULL, '$name', '$email', '$mess')");

/*
 * Переадресация на главную страницу
 */

header('Location: /');