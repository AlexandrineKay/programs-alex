<?php
class Post extends Controller
{
    public function postPost()
    {
        $per_page = 5;
        $page = isset($_GET['page']) ? $_GET['page'] : 0;
        $good_id = empty($params['good_id']) ? null : (int)$params['good_id'];
        $goods = load_goods(connection(), $good_id, $per_page, $page);
        if (IsChecked('formDoor', '1')) {
            $goods = load_br(connection(), $good_id, $per_page, $page);
        }
        if (IsChecked('formDoor', '2')) {
            $goods = load_kl(connection(), $good_id, $per_page, $page);
        }
        echo template("Templates/templatecateg.php", [
            'goods'=>$goods,
            'good_id' => $good_id,
            'token' => token(),
            'page' => $page,
        ]);
    }
}