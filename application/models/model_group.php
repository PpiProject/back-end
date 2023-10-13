<?php


class Group extends Model
{
    public function getAllGroup(){
        $textSql = "select * from `groups`";

        $db = new DB();

        return $db->query($textSql);
    }
}