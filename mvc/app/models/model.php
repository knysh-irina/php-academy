<?php

namespace Tasks\models;

use System\DB;
use Tasks\components\NotFoundException;

class Model
{
    private $db;

    public $keyField;

    public $tableName;

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = DB::get_instance();
    }

public function updateById($id, $description, $status){

    $q = "UPDATE " . $this->tableName . " SET `description`='$description' , `done`='$status' where `id` = '$id' " ;
    var_dump($q);
    $result = $this->db->query($q);
}

    public function getById($id)
    {
        $q = "select * from " . $this->tableName . " where " .
            $this->keyField . "  = " . $id;
        $result = $this->db->query($q);
        $array = $result->fetch();
        if (empty($array)) {
            throw new NotFoundException();
        }
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }

    public function getAll()
    {
        $q = "select * from " . $this->tableName;
        $result = $this->db->query($q);
        $array = $result->fetchAll();
        if (empty($array)) {
            throw new NotFoundException();
        }
        return $array;
    }


    public function getFilterTasks($user_name, $email, $status)
    {

        $q = "select * from " . $this->tableName . " where `user_name` = '$user_name' and `email` = '$email' and `done` = '$status'";
        $result = $this->db->query($q);
        $array = $result->fetchAll();

        if (empty($array)) {
            throw new NotFoundException();
        }
        return $array;
    }
    public function addTask($data, $img){
         $user_name = $data['user_name'];
         $email = $data['email'];
         $description = $data['description'];


        $q = "insert into " . $this->tableName . " ( `user_name`, `email`, `description`, `image`)
         VALUES ( '$user_name' , '$email' , '$description' , '$img' )";
        var_dump($q);
         $this->db->query($q);

    }
}