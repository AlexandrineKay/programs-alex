<?php
/**
 * Created by PhpStorm.
 * User: 805299
 * Date: 30.03.2016
 * Time: 21:59
 */
error_reporting(E_ALL);
$connection = new \PDO("mysql:host=localhost;dbname=epic", 'root', 'vagrant', [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);
if (!empty($_POST['login'])) {
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
    <input type="submit">
</form>