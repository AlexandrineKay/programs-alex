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
            <a href="index.php?action=show&message_id"<?= $message['id'] ?>"><h2>message № <?= $message['id'] ?></h2></a>
            <div><?= htmlspecialchars($message['message']); ?></div>
            <span class="right"><?= $message['date']; ?></span>
        </div>
    <?php endforeach ?>
<?php endif ?>

<form action ='index.php?action=post' method="POST">
    <textarea name="message" id="message" rows="10"><?= empty($message_id) ? '' : $messages[0]['message'] ?></textarea>
    <input type="hidden" name="message_id" value="<?= $message_id ?>">
    <input type="submit" name="action" value="save">
    <input type="hidden" name="token" value="<?= $token ?>">
</form>
</body>
</html>