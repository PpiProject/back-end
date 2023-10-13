<?php
class DB
{

    private $db;

    public function __construct()
    {
        $dbinfo = require 'dbInfo.php';
        // Подключение
        $this->db = new PDO('mysql:host=' . $dbinfo['host'] . ';dbname=' . $dbinfo['dbname'], $dbinfo['login'], $dbinfo['password']);
    }

    public function insert($tableName, $data)
    {
        $str = '';
        $str2 = '';

        foreach ($data as $keys => $values){
            $str.= ':'.$keys.', ';
            $str2.= ''.$keys.', ';
        }

        $str = trim($str, ' ,');
        $str2 = trim($str2, ' ,');

        $sqlString = 'insert into `' . $tableName . '`(' . $str2 . ') values (' . $str . ')';

        $res = $this->db->prepare($sqlString);

        if (!empty($data)){
            foreach ($data as $key => $value){
                $res->bindValue(":$key", $value);
            }
        }

        $res->execute();

        return $res;
    }

    public function updateRelatedTable($tableName, $dataArr, $fieldId, $tableInsert)
    {
        $sqlText = 'select MAX(`id`) from `'.$tableName.'`';

        $response = $this->query($sqlText);

        $lastId = $response[0]['MAX(`id`)'];

        $dataArr[$fieldId] = $lastId;

        return  $this->insert($tableInsert, $dataArr);
    }


    public function query($sql, $params = [])
    {
        // Подготовка запроса
        $stmt = $this->db->prepare($sql);

        // Обход массива с параметрами
        // и подставляем значения
        if ( !empty($params) ) {
            foreach ($params as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
        }

        // Выполняя запрос
        $stmt->execute();


        // Возвращаем ответ
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAll($table, $sql = '', $params = [])
    {
        return $this->query("SELECT * FROM $table" . $sql, $params);
    }

    public function getRow($table, $sql = '', $params = [])
    {
        $result = $this->query("SELECT * FROM $table" . $sql, $params);
        return $result[0];
    }

}