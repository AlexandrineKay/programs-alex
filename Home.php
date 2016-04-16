<?php
class Home
{
    public $connection;
    public function __construct($connection)
    {
        $this->connection=$connection;
    }

    public function getConnection()
    {
        return $this->connection;
    }
    public function getHome(){
        $user = user();
        if (empty($user)){
            header("Location:index.php?action=login");
        }

        $message_id = empty($_GET['message_id']) ? null : (int)$_GET['message_id'];
        $messages = load_messages($this->connection, $message_id, $user);
        echo template("verstka.php", [
            'messages' => $messages,
            'message_id' => $message_id,
            'token' => token(),]);
    }
}