<?php
class Post
{ public $connection;
    public function __construct($connection)
    {
        $this->connection=$connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }
    public function getPost($connection){
        if (empty($user)) {
            header("Location:index.php?action=login");
        }
        $message_id = empty($_POST['message_id']) ? null : (int)$_POST['message_id'];
        $message = empty($_POST['message']) ? null : $_POST['message'];
        if (!empty($message) && valid_token($_POST['token'])) {
            isset($message_id)
                ? update_message($connection, $message, $message_id)
                : insert_message($connection, $message, $user);
        }
        header("Location:index.php?action=home");
    }
}