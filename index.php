<?php
session_start();
require "functions.php";
//require "Login.php";
//require "Post.php";
//require "Home.php";
spl_autoload_register(function ($class)
{
    include "{$class}.php";
});
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connection = connection(['host' => 'localhost', 'dbname' => 'epic', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
$user = user();
$action = empty($_GET['action']) ? 'home' : $_GET['action'];
switch ($action) {
    case 'login':
        $login = new Login($connection);
        $login -> getLogin($connection);
        break;
    case 'post':
        $post = new Post($connection);
        echo $post -> getPost($connection);
        break;
    default:
        $home = new Home($connection);
        echo $home -> getHome();
        break;
}



