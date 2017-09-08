<?php

namespace Tasks\config;

class Routes
{
    static public function getRoutes()
    {
        return [
            [ 'Item/GetItemById' => 'item/show', 'method'=>'GET' ],
            [ 'Item/GetAllItems' => 'item/showAll', 'method'=>'GET' ],
            [ 'Item/GetFilterItems' => 'item/filter', 'method'=>'POST' ],
            [ 'Item/AddTask' => 'item/addTask', 'method'=>'GET' ],
            [ 'Item/LogIn' => 'item/logIn', 'method'=>'GET' ],
            [ 'Item/AddTaskToDB' => 'item/addTaskToDB', 'method'=>'POST' ],
            [ 'Item/SignIn' => 'item/signIn', 'method'=>'POST' ],
            [ 'Item/LogOut' => 'item/logOut', 'method'=>'GET' ],
            [ 'Item/EditTask' => 'item/editTask', 'method'=>'GET' ],
            [ 'Item/EditTaskInDB' => 'item/editTaskInDB', 'method'=>'POST' ]




        ];

    }

}
