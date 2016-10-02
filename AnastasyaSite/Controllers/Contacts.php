<?php
class Contacts extends Controller
{
    public function getContacts($params = []){
        echo template("Templates/templatecontacts.php", [
            'token' => token(),
        ]);
    }
}