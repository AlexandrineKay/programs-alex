<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <style type="text/css">
    body {
    width: 50%;
    margin-left: auto;
            margin-right: auto;
        background: url(http://2.bp.blogspot.com/-9Bvkqke3-4I/TZrVwdS3FvI/AAAAAAAABYo/uSWDuNAJe-g/s1600/%25D0%2592%25D0%25B8%25D0%25BD%25D1%2582%25D0%25B0%25D0%25B6+%25D1%2581+%25D0%25B3%25D0%25BE%25D0%25BB%25D1%2583%25D0%25B1%25D1%258B%25D0%25BC+%25D0%25BA%25D0%25BE%25D0%25BF%25D0%25B8%25D1%258F.jpg);
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
            //background:white;
}
        .message {
            //background:white;
    margin-bottom: 50px;
            border: 2px;
        }
    </style>
</head>
<body>
<h1 align="center" > Добро пожаловать в блог! </h1>
<?php if (!empty($messages)): ?>
    <?php foreach ($messages as $message): ?>
        <div class="message">
            <a href="index.php?action=home&message_id=<?= $message['id'] ?>"><h2>Message № <?= $message['id'] ?></h2></a>
            <div><?= htmlspecialchars($message['message']); ?></div>
            <span class="right"><?= $message['date']; ?></span>
        </div>
    <?php endforeach ?>
<?php endif ?>

<form action ='index.php?action=post' method="POST">
    <textarea name="message" id="message" cols = "50" rows="10"><?= empty($message_id) ? '' : $messages[0]['message'] ?></textarea>
    <input type="hidden" name="message_id" value="<?= $message_id ?>">
    <input type="submit" name="action" value="save">
    <input type="hidden" name="token" value="<?= $token ?>">
</form>
<form action ='index.php?action=login' method="post">
    <button>Выйти</button>
</form>
</body>
</html>