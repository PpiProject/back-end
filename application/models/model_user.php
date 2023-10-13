<?php
require_once 'vendor/autoload.php';

use \Firebase\JWT\JWT;


class User extends Model
{

    protected $db;
    public function login($data)
    {
        $db = $this->db = new DB();
        $rightUser = $this->right = new Right();

        $textSql = "select * from `users` where `login` =:login";

        $dataLogin = ['login' => $data['login']];

        $result = $db->query($textSql, $dataLogin);

        $arrRight = $rightUser->getUserRight($result[0]['id']);

        $result = [];

        foreach ($arrRight as $items){
            $result = $items;
        }

        return $result;
    }

}