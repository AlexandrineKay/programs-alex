<!DOCTYPE html>
<html lang="en">
<html>
<meta charset="UTF-8">
<title>Login</title>
<style type="text/css">
    body {
        width: 40%;
        margin-left: auto;
        margin-right: auto;
        background: url(http://www.shabbyblogs.com/storage/new/ShabbyBlogsNatalie.jpg) repeat-y;
        background-size: 100%;
    }
    h3{color: #E59866;}
</style>
</head>
<body>
<h3> Войти </h3>
<form action ='index.php?action=login' method="POST">
    <p>Введите логин:</p> <input type="text" name="login" title="login">
    <p>Введите пароль:</p><input type="password" name="password" title="password">
    <input type ="hidden" name ="token" value = <?php echo token() ?>>
<input type="submit" name="action" value="login">
</form>
</body>
</html>