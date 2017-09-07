<?php

namespace Tasks\models;

class ItemsModel extends Model
{

    public $tableName = 'tasks';

    public $keyField = 'id';

    public function __construct()
    {
        parent::__construct();
    }

    public function toArray()
    {
        return [
            "id" => $this->id,
            "user_name" => $this->user_name,
            "email" => $this->email,
            "description" => $this->description,
            "image" => $this->image,
            "done" => $this->done
        ];
    }

}