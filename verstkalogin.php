<!DOCTYPE html>
<html lang="en">
<html>
<meta charset="UTF-8">
<title>Login</title>
</head>
<body>
<form action="login.php" method="POST">
    <input type="text" name="login">
    <input type="password" name="password">
    <input type ="hidden" name ="token" value = <?php echo token() ?>>
<input type="submit">
</form>
</body>
</html>