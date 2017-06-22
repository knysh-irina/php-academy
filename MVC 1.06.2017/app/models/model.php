<?php

namespace ToilonShop\models;

use \System\DB;
use ToilonShop\components\NotFoundException;

class Model
{
    private $db;

    public $keyField;

    public $tableName;

    public $repository = [];

    /**
     * Model constructor.
     * @param $db
     */
    public function __construct()
    {
        $this->db = DB::get_instance();
    }


    public function getById($id)
    {
        $q = "select * from " . $this->tableName . " where " .
            $this->keyField . "  = ".  $id ;
        $result = $this->db->query($q);
        $array = $result->fetch();
        if (empty($array)) {
            throw new NotFoundException();
        }
        foreach ($array as $key=>$value)
        {
            $this->$key = $value;
        }


    }
///ДОДЕЛАТЬ!!!!!!!!!!
    public function saveItem($values){
        echo "Im trying to save".$values;
        $q = "insert into " . $this->tableName  ." (price, description)".
             " VALUES (".  $values .")";
        echo $q;
        $result = $this->db->query($q);

    }
//http://localhost/mvc/mvc/admin/setItem?id=%22Newmacint%22,20353453



}