<?php


class Controller_User extends Controller
{
    protected $user;
    protected $auth;
    public $db;

    public function __construct()
    {
        $this->db = new DB();
        $this->user = new User();
        $this->auth = new AuthServer();
    }

    public function action_login()
    {
        $data = json_decode(file_get_contents('php://input'), true);

        $result = [];

        if (!empty($data)) {

            $userData = $this->user->login($data);

            if (!empty($userData)) {
                if (password_verify($data['password'], $userData['password'])) {
                    $userName = $userData['last_name'] . " " . $userData['first_name'];
                    $idRight = $userData['idRole'];

                    $token = $this->auth->generateToken($userName, $idRight);

                    $result = [
                        'login' => $userData['login'],
                        'first_name' => $userData['first_name'],
                        'last_name' => $userData['last_name'],
                        'token' => $token,
                        'nameRole' => $userData['nameRole']
                    ];
                }
            }
            echo json_encode($result);
        }
    }

    public function action_writeUsersToBase()
    {
        $db = $this->db;
        $logger = $this->logger;
        $csv = fopen(__DIR__ . '/atit.csv', "r");


        while ($data = fgetcsv($csv, null, ";")) {

            $arrData = [
                'login' => $data[3],
                'password' => password_hash($data[4], PASSWORD_BCRYPT),
                'last_name' => $data[0],
                'first_name' => $data[1],
                'second_name' => $data[2],
                'email' => $data[5]
            ];

            print_r($arrData);

            $writeUser = $db->insert('users', $arrData);
        }
    }

    public function action_updTableUser(){
        $db = $this->db;

        $selectText = "select `id` from `users` where `id` between 44 and 55";
        $arrId = $db->query($selectText);

        print_r($arrId);

        foreach ($arrId as $items) {
            $dataTeachers = [
                'idUser' => $items['id'],
                'idDepartment' => 3
            ];

            $writeTeachers = $db->insert('teachers', $dataTeachers);

            $arrRight = [
                'idUser' => $items['id'],
                'idRole' => 3
            ];

            $writeRight = $db->insert('usersroles', $arrRight);
        }
    }

}