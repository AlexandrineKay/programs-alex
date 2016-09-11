<?php
class Home extends Controller
{
    public function getHome($params = []){
        $user = user();
        $per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page']: 0;
        $message_id = empty($params['message_id']) ? null : (int)$params['message_id'];
       $messages = load_messages(connection(), $message_id, $user, $per_page, $page);
        $num_pages= ceil(count_messages(connection(), $user)/$per_page);
        echo template("Templates/template.php", [
            'messages' => $messages,
            'message_id' => $message_id,
            'token' => token(),
            'page' => $page,
            'num_pages'=> $num_pages,
        ]);
    }
}