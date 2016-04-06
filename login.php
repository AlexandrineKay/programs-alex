<?php
/**
 * Created by PhpStorm.
 * User: 805299
 * Date: 30.03.2016
 * Time: 21:59
 */
session_start();
ini_set('display_errors', 1);
require "functions.php";
$connection = connection(['host' => 'localhost', 'dbname' => 'epic', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);


if (!empty($_POST['login']) && $_REQUEST['token'] == $_SESSION['token']) {
    $a = $connection->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password`=:password');
    $a->execute([
            ':login' => $_POST['login'],
            ':password' => md5($_POST['password']),
        ]
    );
    $user = $a->fetch();
    if(!$user ){
        echo "Неправильный логин или пароль";
    } else {$_SESSION['user'] = $user;
        header("Location: blog.php");}
}

echo template("verstkalogin.php",[
    'token' => token(),]);