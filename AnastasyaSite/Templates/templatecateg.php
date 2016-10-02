<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ласточка</title>
    <link rel="shortcut icon" href="https://66.media.tumblr.com/2e5926fbce178b89b5448e2dc2a2d144/tumblr_oczwn2yvmU1szmf1so1_75sq.png" type="image/png">
    <style type="text/css">
    body {background-image: url(http://365psd.ru/images/backgrounds/old-paper-text.jpg);
            background-color: #c7b39b;
            font-family:arial, verdana, sans-serif;
            font-size: 16px;}
        table td{height: 50px; border: 0px solid #000;}
        H1{color: #8A0808;
    font-style: italic;
            font-size: 36px;
            letter-spacing: 10px;}
        H2{padding: 10px;
            color: #8A2908;
            font-size: 24px;}
        H3{color:#61380B;
    font-size: 22px;}
        H4{color:#8A0808;}
        p {text-indent: 20px;
            padding: 10px;}
        a{
            color:#61380B;
    text-decoration: none;
            transition: 1s linear;
        }
        a:hover {
    color: #fff; /* Цвет текста */
}
   .good{
       text-align: center;
   }
    </style>
</head>
<body>
<table style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);" width=94% align="center" >
    <tr>
       <td><a href="index.php?action=home"><img src="https://67.media.tumblr.com/41bc2deea7a3611f5206de875725737e/tumblr_oczvy4Sgs81szmf1so1_250.png"></a></td>
        <td colspan = "2" align = "center">  <H1>  <a name ="nw"></a> Мастерская "Ласточка" </H1> </td>
    </tr>
    <tr style = "background-image:url(http://365psd.ru/images/backgrounds/paper-1.jpg);">
        <td style = "width:20%;height:250px; vertical-align: top;">
            <table width = "100%" height = "200px" cellpadding="10">
                <tr><td><H3 align="center"> Фильтр </H3>
                        <form action ='index.php?action=post' method="POST">
                        <p><input type="checkbox" name="formDoor[]" value="1"> Браслеты </p>
                        <p><input type="checkbox" name="formDoor[]" value="2"> Колье и кулоны </p>
                        <p><input type="checkbox" name="formDoor[]" value="3"> Кольца </p>
                        <p><input type="checkbox" name="formDoor[]" value="4"> Броши </p>
                        <p><input type="checkbox" name="formDoor[]" value="5"> Серьги </p>
                        <p><input type="submit" name="formSubmit" value="Применить"></p> <hr/> </td></tr>
            </table> </td>
        <td style = "height:525px;"><H2 align = "center"> Товары </H2>
            <?php if (!empty($goods)): ?>
    <?php foreach ($goods as $good): ?>
           <table> <tr><td><img src="<?= $good['picture'];?>" width="200" height="200"></td>
                       <td> <div class="good"><div> <b><?= htmlspecialchars($good['title']); ?></b> </div>
                        <div><?= htmlspecialchars($good['description']); ?></div>
                        <div><em><?= htmlspecialchars($good['price']); ?> рублей </em> </div></div></td>
               <td> <form><p><input type="image" src="https://eda.citysakh.ru/img/eda/cart.png" height="50px"width="50px" alt="В корзину"></p></form> </td></tr></table>
    <?php endforeach ?>
<?php endif ?>
    <a href="index.php?action=home"><p align="right">На главную </p></a>
<tr>
    <td colspan = "2" align = "center"> <H4> <b> (c) Коновалова Александра 2016 </b> </H4> </td>
</tr>
</table>
</body>
</html>