<?php
class Login extends Controller
{
    public function postLogin()
    {
        $user = user();
        if (!empty($_POST['login']) && $_REQUEST['token'] == $_SESSION['token']) {
            $a = connection()->prepare('SELECT * FROM `users` WHERE `login` = :login AND `password`=:password');
            $a->execute([
                    ':login' => $_POST['login'],
                    ':password' => md5($_POST['password']),
                ]
            );
            $user = $a->fetch();
            if (!$user) {
                echo "Неправильный логин или пароль";
            } else {
                $_SESSION['user'] = $user;
                header("Location: index.php");
            }
        }
        echo template("verstkalogin.php", [
            'token' => token(),]);
    }
    public function getLogin(){
        $user = user();
        if (!empty($user)) {
            $_SESSION['user'] = $user;
            header("Location: index.php");
        }

        echo template("verstkalogin.php", [
        'token' => token(),]);
}
}