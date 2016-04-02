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


if (!empty($_POST['login']) &&$_REQUEST['token'] == $_SESSION['token']) {
    $a = $connection->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password`=:password');
    $a->execute([
            ':login' => $_POST['login'],
            ':password' => md5($_POST['password']),
        ]
    );
    if(!($a->fetch())){
        echo "Неправильный логин или пароль";
    } else {header("Location: blog.php");}
}
?>

<form action="login.php" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type ="hidden" name ="token" value = <?php echo token() ?>>
    <input type="submit">
</form>