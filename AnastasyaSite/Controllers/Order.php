<?php
class Order extends Controller
{
    public function getOrder($params = []){
        echo template("Templates/templateorder.php", [
            'token' => token(),
        ]);
    }
}