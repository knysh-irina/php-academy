<?php

namespace ToilonShop\config;

class Routes
{
    static public function getRoutes()
    {
        return [
            [ 'item/getItemById' => 'item/show', 'method'=>'GET' ],
            [ 'item/delete' => 'item/1', 'method'=>'DELETE' ],
            ['item/getItemByIds' => 'item/showItems', 'method'=>'GET'],
            [ 'admin/setItem' => 'admin/setItem', 'method'=>'GET' ],
            ['item/addComment' => 'item/addComment', 'method'=>'POST' ],
            ['fb/fbCallback' => 'fb/fbCallback', 'method' => 'GET']
        ];

    }

}
