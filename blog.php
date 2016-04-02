<?php
require "functions.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connection = new \PDO("mysql:host=localhost;dbname=epic", 'root', 'vagrant', [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if (!empty($_GET['message'])) {
    $a = $connection->prepare("INSERT INTO `posts` SET `message`=:message, `title` = :title,`date`=NOW(), `user_id`=0");
    $a->execute([
        ':message' => $_GET['message'],
        ':title' => $_GET['title'],
    ]);
}
$messages = $connection->query('SELECT p.`title`,p.`date`,p.`message` FROM `posts`  p LEFT JOIN `users`  u ON p.`user_id`= u.`id` ORDER BY  p.`date` DESC')->fetchAll();
echo template("verstka.php",[
'messages' => $messages,]);




