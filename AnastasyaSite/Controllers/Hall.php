<?php
class Hall extends Controller
{
    public function getHall($params = []){
        $per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page']: 0;
        $hall_id = empty($params['hall_id']) ? null : (int)$params['hall_id'];
        $halls = load_halls(connection(), $hall_id, $per_page, $page);
        $num_pages= ceil(count_halls(connection())/$per_page);
        echo template("Templates/templatehall.php", [
            'halls' => $halls,
            'hall_id' => $hall_id,
            'token' => token(),
            'page' => $page,
            'num_pages'=> $num_pages,
        ]);
    }
}