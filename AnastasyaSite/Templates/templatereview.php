<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ласточка</title>
    <link rel ="stylesheet"  type = "text/css" href="style.css">
    <link rel="shortcut icon" href="https://66.media.tumblr.com/2e5926fbce178b89b5448e2dc2a2d144/tumblr_oczwn2yvmU1szmf1so1_75sq.png" type="image/png">
</head>
<body>
<table style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);" width=94% align="center" >
    <tr>
        <td><a href="index.php?action=home"><img src="https://67.media.tumblr.com/41bc2deea7a3611f5206de875725737e/tumblr_oczvy4Sgs81szmf1so1_250.png"></a></td>
        <td colspan = "2" align = "center">  <H1>  Мастерская "Ласточка" </H1> </td>
    </tr>
    <tr style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);">
        <td style = "width:20%;height:250px; vertical-align: top;">
            <table width = "100%" height = "200px" cellpadding="10">
                <tr><td><a href="index.php?action=category"><H3>Товары</H3></a> <hr/> </td></tr>
                <tr><td><a href="index.php?action=order"><H3> На заказ </H3> </a><hr/> </td></tr>
                <tr><td><a href="index.php?action=review"><H3> Отзывы </H3></a> <hr/> </td></tr>
                <tr><td><a href="index.php?action=hall"><H3> "Зал славы" </H3></a> <hr/> </td></tr>
                <tr><td><a href="index.php?action=contacts"><H3> Контакты </H3></a>  <hr/> </td></tr>
            </table> </td>
        <td style = "height:525px;"><H2 align = "center"> Отзывы </H2>
            <b> Чтобы оставить отзыв, заполните форму ниже:</b>
            <form action ='index.php?action=newreview' method="POST">
                <table><tr> <td>Отзыв:</td> <td> <textarea name="review" id="review" cols = "70" rows="2"><?= empty($review_id) ? '' : $review['message'] ?></textarea> </td></tr>
                    <tr><td> Ваше имя:</td><td><textarea name="user_name" id="user_name" cols = "70" rows="1"><?= empty($review_id) ? '' : $review['user_name'] ?></textarea></td></tr></table>
                <input type="hidden" name="review_id" value="<?= $review_id ?>">
                <input type="submit" name="action" value="Сохранить">
                <input type="hidden" name="token" value="<?= $token ?>">
            </form>
            <?php if (!empty($reviews)): ?>
                <?php foreach ($reviews as $review): ?>
                    <div class="message">
                        <h2>Отзыв от <?= htmlspecialchars($review['date']); ?></h2>
                        <table><tr><td><div><p><?= htmlspecialchars($review['message']); ?></p></div></td></tr>
                            <tr><td><div> <p align="right"> <?= htmlspecialchars($review['user_name']); ?></p></div></td></tr></table>
                    </div>
                <?php endforeach ?>
            <?php endif ?>
            <a href="index.php?action=home"><p align="right">На главную </p></a></td>
    <tr>
        <td colspan = "2" align = "center"> <H4> <b> (c) Коновалова Александра 2016 </b> </H4> </td>
    </tr>
</table>
</body>
</html>