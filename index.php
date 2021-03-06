<?php
session_start();
require "functions.php";
spl_autoload_register(function ($class)
{
    include "Controllers/{$class}.php";
});
ini_set('display_errors', 1);
error_reporting(E_ALL);
$connection = connection(['host' => 'localhost', 'dbname' => 'epic', 'user' => 'root', 'password' => 'vagrant', 'encoding' => 'utf8']);
routes($_SERVER['REQUEST_URI'],[
    'home' => 'Home',
    'post' => 'Post',
    'login' => 'Login',
]);

