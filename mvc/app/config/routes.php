<?php

namespace Tasks\config;

class Routes
{
    static public function getRoutes()
    {
        return [
            [ 'item/getItemById' => 'item/show', 'method'=>'GET' ],
            [ 'item/getAllItems' => 'item/showAll', 'method'=>'GET' ],
            [ 'item/getFilterItems' => 'item/filter', 'method'=>'POST' ],
            [ 'item/addTask' => 'item/addTask', 'method'=>'GET' ],
            [ 'item/logIn' => 'item/logIn', 'method'=>'GET' ],
            [ 'item/addTaskToDB' => 'item/addTaskToDB', 'method'=>'POST' ],
            [ 'item/signIn' => 'item/signIn', 'method'=>'POST' ],
            [ 'item/logOut' => 'item/logOut', 'method'=>'GET' ],
            [ 'item/editTask' => 'item/editTask', 'method'=>'GET' ],
            [ 'item/editTaskInDB' => 'item/editTaskInDB', 'method'=>'POST' ]




        ];

    }

}
