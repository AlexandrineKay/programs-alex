<?php
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
function token()
{
    $token = uniqid();
    $_SESSION['token'] = $token;
    return $token;
}
function template($name, array $vars = [])
{
    if (!is_file($name)) {
        throw new exception("Could not load template file {$name}");
    }
    ob_start();
    extract($vars);
    require($name);
    $contents = ob_get_contents();
    ob_end_clean();
    return $contents;
}
function update_message(\PDO $connection, $message, $message_id)
{
    if (empty($message)) {
        return false;
    }
    $query = $connection->prepare('UPDATE `posts` SET `message`=:message WHERE `id`=:message_id');
    return $query->execute([
        'message' => $message,
        'message_id' => $message_id
    ]);
}
function insert_message(\PDO $connection, $message, $user)
{
    if (!empty($message)) {
        $a = $connection->prepare("INSERT INTO `posts` SET `message`=:message, `date`=NOW(), `user_id`= :user_id");
        //`user_id`={$user['id']}");
        $a->execute([
            ':message' => $message,
            ':user_id' => $user['id'],
        ]);
    }
}
function count_messages(\PDO $connection)
{
    $connection->query('SELECT  count(*) FROM `posts`');
}
function load_messages(\PDO $connection, $message_id = null, $user)
{
    //$user = user();
    $per_page=10;
    $start = 0;
    if (isset($_GET['page'])) $page=($_GET['page']+1); else $page=0;
    $start=abs($page*$per_page);
    if ($message_id !== null) {
        $message_id = (int)$message_id;
    }
    return
        $message_id === null
            ? $connection->query("SELECT p.`date`,p.`message`, p.`id` FROM `posts`  p  WHERE p.`user_id` = {$user['id']} ORDER BY  p.`date` DESC LIMIT {$start},{$per_page}")->fetchAll()
            : $connection->query("SELECT p.`date`,p.`message`,p.`id` FROM `posts` p WHERE p.`id`={$message_id} ORDER BY p.`date` DESC")->fetchAll();
}