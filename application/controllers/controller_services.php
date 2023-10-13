<?php
require_once 'vendor/autoload.php';
use \Firebase\JWT\JWT;
use \Firebase\JWT\Key;

class Controller_Services extends Controller
{

	function action_index()
	{
		$this->view->generate('services_view.php', 'template_view.php');
	}

	public function action_echoText()
    {

        $db = $this->db;

        $data = json_decode(file_get_contents('php://input'), true);

        $arrData = [
            'login' => $data['login'],
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name']
        ];

        $write = $db->insert('users', $arrData);

	    echo json_encode($write);
    }

    public function action_inspectToken(){
        $data = json_decode(file_get_contents('php://input'));
        $token = (string)$data->token;
        $secretKey  = 'bGS6lzFqvvSQ8ALbOxatm7/Vk7mLQyzqaS34Q4oR1ew=';
        $decoded = JWT::decode($token, new Key($secretKey, 'HS512'));

        $timeNow = new DateTime($decoded->iat->date);

        $intreval = $timeNow->diff(date_create('now'));

        echo json_encode($intreval->i);
    }
}
