<!DOCTYPE html>
<html lang="en">
<html>
<meta charset="UTF-8">
<title>Login</title>
<style type="text/css">
    body {
        width: 50%;
        margin-left: auto;
        margin-right: auto;
        background: url(http://2.bp.blogspot.com/-9Bvkqke3-4I/TZrVwdS3FvI/AAAAAAAABYo/uSWDuNAJe-g/s1600/%2525D0%252592%2525D0%2525B8%2525D0%2525BD%2525D1%252582%2525D0%2525B0%2525D0%2525B6+%2525D1%252581+%2525D0%2525B3%2525D0%2525BE%2525D0%2525BB%2525D1%252583%2525D0%2525B1%2525D1%25258B%2525D0%2525BC+%2525D0%2525BA%2525D0%2525BE%2525D0%2525BF%2525D0%2525B8%2525D1%25258F.jpg);
    }
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