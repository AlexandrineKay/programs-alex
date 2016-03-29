<?php
$pdo = new PDO(
    "mysql:host=localhost;dbname=epic;charset=utf8", "root", "vagrant"
);
$statement = $pdo->query(
    "SELECT * FROM posts"
);
$pdo->query(
    "INSERT INTO posts SET  `title` ='{$_GET['title']}', `user_id` ={$_GET['user_id']}"
);
//while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
// echo htmlentities($row["id"]);
//};
$row = $statement->fetchAll(PDO::FETCH_ASSOC);
var_dump($_GET);
var_dump($_POST);
?>
<?php if (!empty($row)): ?>
    <?php foreach ($row as $message): ?>
        <div class="message">
            <div><?= $message['title']; ?></div>
            <span class="left"><?= $message['user_id']; ?></span>
            <span class="right"><?= $message['date']; ?></span>
        </div>
        <br/>
    <?php endforeach ?>
<?php endif ?>
<form action="blog.php" method="GET">
    <input type="text" name="title">
    <input type="text" name="message">
    <input type="submit">
</form>


