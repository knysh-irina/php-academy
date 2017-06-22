<?php

namespace ToilonShop\models;

class ItemsModel extends Model
{

    public $tableName = 'articles';

    public $keyField = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function toArray()
    {
        return [
            "id" => $this->id,
            "price" => $this->price,
            "description" => $this->description,
        ];
    }



}