<?php


class Right
{
    protected $db;

    public function getAllRights()
    {
        $db = $this->db = new DB();

        $selectText = "select * from `roles`";

        return $db->query($selectText);
    }

    public function getUserRight($idUser){
        $db = $this->db = new DB();

        $selectText = "select * from `usersroles` left join `users` on `users`.`id` = `usersroles`.`idUser` join `roles` on 
                        `roles`.`idRole` = `usersroles`.`idRole` where `users`.`id` = :id";

        $userArr = ['id' => $idUser];
        return $db->query($selectText, $userArr);
    }

}