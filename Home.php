<?php
class Home
{
    public $connection;
    public $num_pages;
    public $page;
    public $cur_page;
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
        $per_page = 10;
        $page = 0;
        if (isset($_GET['page'])) $page=($_GET['page']+1); else $page=0;
        if (empty($user)){
            header("Location:index.php?action=login");
        }
        $message_id = empty($_GET['message_id']) ? null : (int)$_GET['message_id'];
        $messages = load_messages($this->connection, $message_id, $user);
        $num_pages= count_messages($this->connection)/$per_page;
        echo template("verstka.php", [
            'messages' => $messages,
            'message_id' => $message_id,
            'token' => token(),
            'page' => $page,
            'num_pages'=> $num_pages,
        ]);
    }
}