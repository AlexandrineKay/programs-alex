<?php
session_start();
require "functions.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connection = connection(['host' => 'localhost', 'dbname' => 'epic', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
$user = $_SESSION['user'];

if (!empty($_POST['message'])) {
    $a = $connection->prepare("INSERT INTO `posts` SET `message`=:message, `title` = :title,`date`=NOW(), `user_id`='user_id' ");
    $a->execute([
        ':message' => $_POST['message'],
        ':title' => $_POST['title'],
    ]);
}
if (!empty($_POST['title'])) {
$query = $connection->prepare('UPDATE `posts` SET `message`=:message WHERE `title`=:title');
$query->execute([
':message' => $_POST['message'],
 ':title' =>  $_POST['title'],
]);}
if (empty($user)) {
   header("Location:login.php" );}
$messages = $connection->query("SELECT p.`title`,p.`date`,p.`message` FROM `posts`  p  WHERE p.`user_id` = {$user['id']} ORDER BY  p.`date` DESC")->fetchAll();
echo template("verstka.php",[
'messages' => $messages,]);




