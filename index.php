<?php
session_start();
require "functions.php";
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connection = connection(['host' => 'localhost', 'dbname' => 'epic', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
$user = user();
$action = empty($_GET['action']) ? 'home' : $_GET['action'];
switch ($action) {
    case 'login':
        if (!empty($_POST['login']) && $_REQUEST['token'] == $_SESSION['token']) {
            $a = $connection->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password`=:password');
            $a->execute([
                    ':login' => $_POST['login'],
                    ':password' => md5($_POST['password']),
                ]
            );
            $user = $a->fetch();
            if (!$user) {
                echo "Неправильный логин или пароль";
            } else {
                $_SESSION['user'] = $user;
                header("Location: index.php");
            }
        }
        echo template("verstkalogin.php", [
            'token' => token(),]);
        break;
    case 'post':
        if (empty($user)) {
            header("Location:index.php?action=login");
        }
        $message_id = empty($_POST['message_id']) ? null : (int)$_POST['message_id'];
        $message = empty($_POST['message']) ? null : $_POST['message'];
        //$messages = load_messages($connection, $message_id);
        if (!empty($message) && valid_token($_POST['token'])) {
           isset($message_id)
               ? update_message($connection, $message, $message_id)
               : insert_message($connection, $message, $user);
        }
        header("Location:index.php?action=home");
       break;
    default:
        $message_id = empty($_GET['message_id']) ? null : (int)$_GET['message_id'];
        $messages = load_messages($connection, $message_id);
        if (empty($user)) {
            header("Location:index.php?action=login");
        }
        echo template("verstka.php", [
            'messages' => $messages,
            'message_id' => $message_id,
            'token' => token(),]);
        break;
}



