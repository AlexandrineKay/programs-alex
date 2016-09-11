<?php
class Category extends Controller
{
    public function getCategory($params = []){
        $per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page']: 0;
        $good_id = empty($params['good_id']) ? null : (int)$params['good_id'];
        $goods = load_goods(connection(), $good_id, $per_page, $page);
        $num_pages= ceil(count_goods(connection())/$per_page);
        echo template("Templates/templatecateg.php", [
            'goods' => $goods,
            'good_id' => $good_id,
            'token' => token(),
            'page' => $page,
            'num_pages'=> $num_pages,
        ]);
    }
}