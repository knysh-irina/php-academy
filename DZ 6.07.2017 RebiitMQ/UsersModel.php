<?php
namespace ToilonShop\models;

class UsersModel extends Model
{
    public $tableName = 'users';

    public $keyField = 'id';


    public function __construct()
    {
        parent::__construct();
    }

    public function toArray()
    {
        return [

            "id" => $this->id,
            "fb_id" => $this->fb_id,
            "name" => $this->name ,
            "img" => $this->img,
            "password" => $this->password
        ];
    }

    public function getUserByFbID($id)
    {
        $q = "select * from " . $this->tableName . " where " .
            "fb_id". "  = " . $id;
        $result = $this->db->query($q);
        $array = $result->fetch();
        if (empty($array)) {
            return false;
        }
        foreach ($array as $key => $value) {
            $this->$key = $value;
        }
    }

    /**
     * @param $values string
     */
    public function saveUser($values)
    {


        $q = "insert into " . $this->tableName . " (`fb_id`, `name`,`password`)" .
            " VALUES (" . $values.")";
        echo $q;
        $result = $this->db->query($q);

    }

}