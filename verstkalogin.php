<!DOCTYPE html>
<html lang="en">
<html>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<h3> Войти </h3>
<form action='login.php' method="POST">
    <p>Введите логин:</p> <input type="text" name="login" title="login">
    <p>Введите пароль:</p><input type="password" name="password" title="password">
    <input type ="hidden" name ="token" value = <?php echo token() ?>>
<input type="submit" name="action" value="login">
</form>
</body>
</html>