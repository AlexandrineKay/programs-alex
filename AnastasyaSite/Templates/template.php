<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ласточка</title>
    <link rel ="stylesheet"  type = "text/css" href="style.css">
    <link rel="shortcut icon" href="https://66.media.tumblr.com/2e5926fbce178b89b5448e2dc2a2d144/tumblr_oczwn2yvmU1szmf1so1_75sq.png" type="image/png">
</head>
<body>
<table style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);">
    <tr>
       <td><img src="https://67.media.tumblr.com/41bc2deea7a3611f5206de875725737e/tumblr_oczvy4Sgs81szmf1so1_250.png"></td>
        <td colspan = "2" align = "center">  <H1>  <a name ="nw"></a> Мастерская "Ласточка" </H1> </td>
    </tr>
    <tr style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);">
        <td style = "width:20%;height:250px; vertical-align: top;">
            <table width = "100%" height = "200px" cellpadding="10">
                <tr><td><a href="index.php?action=category"><H3>Товары</H3></a> <hr/> </td></tr>
                <tr><td><a href="index.php?action=order"><H3> На заказ </H3> </a><hr/> </td></tr>
                <tr><td><H3> Отзывы </H3> <hr/> </td></tr>
                <tr><td><H3> "Зал славы" </H3> <hr/> </td></tr>
                <tr><td><H3> Контакты </H3> <hr/> </td></tr>
            </table> </td>
        <td style = "height:525px;"><H2 align = "center">  Акции </H2>
            <?php if (!empty($messages)): ?>
                <?php foreach ($messages as $message): ?>
                    <div class="message">
                        <h2>Акция от <?= $message['date'] ?></h2>
                        <div><?= htmlspecialchars($message['message']); ?></div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
    <tr>
        <td colspan = "2" align = "center"> <H4> <b> (c) Коновалова Александра 2016 </b> </H4> </td>
    </tr>
</table>
</body>
</html>