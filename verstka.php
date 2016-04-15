<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Blog</title>
    <style type="text/css">
    body {
    width: 40%;
    margin-left: auto;
            margin-right: auto;
        background: url(http://www.shabbyblogs.com/storage/new/ShabbyBlogsNatalie.jpg) repeat-y;
        background-size: 100%;
    TEXTAREA {
        width: 100%;
        height: 100px;
    }
}
    h1{color: #E59866;}
    a{color: #EB984E; }
    a:visited{color: #F5CBA7;}
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
            <a href="index.php?action=home&message_id=<?= $message['id'] ?>"><h2>Запись № <?= $message['id'] ?></h2></a>
            <div><?= htmlspecialchars($message['message']); ?></div>
            <span class="right"><?= $message['date']; ?></span>
        </div>
    <?php endforeach ?>
<?php endif ?>

<form action ='index.php?action=post' method="POST">
    <textarea name="message" id="message" cols = "50" rows="10"><?= empty($message_id) ? '' : $messages[0]['message'] ?></textarea>
    <input type="hidden" name="message_id" value="<?= $message_id ?>">
    <input type="submit" name="action" value="Сохранить">
    <input type="hidden" name="token" value="<?= $token ?>">
</form>
<form action ='index.php?action=login' method="post">
    <button>Выйти</button>
</form>
</body>
</html>