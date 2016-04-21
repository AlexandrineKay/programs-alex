<?php
class Post extends Controller
{ public $connection;
    public function postPost(){
        $user = user();
        if (empty($user)) {
            header("Location:index.php?action=login");
        }
        $message_id = empty($_POST['message_id']) ? null : (int)$_POST['message_id'];
        $message = empty($_POST['message']) ? null : $_POST['message'];
        if (!empty($message) && valid_token($_POST['token'])) {
            isset($message_id)
                ? update_message(connection(), $message, $message_id)
                : insert_message(connection(), $message, $user);
        }
        header("Location:index.php?action=home");
    }
}