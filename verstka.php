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
<body>
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
</body>
</html>