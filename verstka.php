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
    TEXTAREA {
        width: 100%;
        height: 100px;
    }
        }
        .left {
    float: left;
}
        .right {
    float: right;
}
        .message {
    margin-bottom: 50px;
            border: 2px;
        }
    </style>
</head>
<body>
<h1 align="center"> Добро пожаловать в блог! </h1>
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
<form action ='index.php?action=post' method="POST">
    <p> Назовите ваш пост:</p>
    <input type="text" name="title">
    <p>Ваше сообщение:</p><textarea name="message" id="message" cols="50" rows="10" ></textarea>
    <input type="submit" name="action" value="send">
</form>
</body>
</html>