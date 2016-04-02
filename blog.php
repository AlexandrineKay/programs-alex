<?php
error_reporting(E_ALL);
$connection = new \PDO("mysql:host=localhost;dbname=epic", 'root', 'vagrant', [
    \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
    \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
    \PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
]);

if (!empty($_GET['message'])) {
    $a = $connection->prepare("INSERT INTO `posts` SET `message`=:message, `title` = :title,`date`=NOW(), `user_id`=0");
    $a->execute([
        ':message' => $_GET['message'],
        ':title' => $_GET['title'],
    ]);
}
$messages = $connection->query('SELECT p.`title`,p.`date`,p.`message` FROM `posts`  p LEFT JOIN `users`  u ON p.`user_id`= u.`id` ORDER BY  p.`date` DESC')->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <style type="text/css">
        body {
            width: 60%;
            margin-left: auto;
            margin-right: auto;
        }
        .left {
            float: left;
        }
        .right {
            float: right;
        }
        .message {
            margin-bottom: 20px;
        }
    </style>
</head>

<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <div class="message">
            <div><?= $message['title']; ?></div>
            <span class="left"><?= htmlspecialchars($message['message']); ?></span>
            <span class="right"><?= "Добавлено:  ".$message['date']; ?></span>
        </div>
        <br/>
    <?php endforeach ?>
<?php endif ?>
<form action="blog.php" method="GET">
    <input type="text" name="title">
    <input type="text" name="message">
    <input type="submit">
</form>

