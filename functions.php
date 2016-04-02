<?php
/**
 * Created by PhpStorm.
 * User: 805299
 * Date: 02.04.2016
 * Time: 14:02
 */
function connection(array $config)
{
    return new \PDO("mysql:host={$config['host']};dbname={$config['dbname']}", $config['user'], $config['password'], [
        \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
        \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        \PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES {$config['encoding']}"
    ]);
}
function valid_token($token)
{
    return !empty($_SESSION['token']) && $token == $_SESSION['token'];
}
function user(\PDO $connection = null, $login = null, $password = null)
{
    if (!empty($_SESSION['user'])) {
        return $_SESSION['user'];
    }
    if (empty($login)) {
        return null;
    }
    $query = $connection->prepare('SELECT * FROM `users` WHERE `login`=:login AND `password`=:password');
    $query->execute([
        ':login' => $login,
        ':password' => md5($password),
    ]);
    $user = $query->fetch();
    if (!empty($user)) {
        $_SESSION['user'] = $user;
    }
    return $user;
}
/**
 * @return string
 */
function token()
{
    $token = uniqid();
    $_SESSION['token'] = $token;
    return $token;
}