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
if (!empty($_GET['login'])) {
    $a = $connection->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password`=:password');
    var_dump($a->execute([
            ':login' => $_GET['login'],
            ':password' => md5($_GET['password']),
        ]
    ));
    var_dump($a->queryString);
    var_dump($a->fetch());
    var_dump(md5($_GET['password']));
    var_dump($_GET['login']);
}
?>
<form action="login.php" method="GET">
    <input type="text" name="login">
    <input type="text" name="password">
    <input type="submit">
</form>