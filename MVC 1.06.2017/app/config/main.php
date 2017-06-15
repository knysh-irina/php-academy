<?php

namespace ToilonShop\config;

class Main
{
    public function getConfig()
    {
        return [
            'common' => [
                'base_url' => '/mvc/mvc/'
            ],
            'database' => [
                'user' => 'root',
                'password' => '',
                'db' => 'shop',
                'host' => 'localhost',
                'driver' => 'mysqli'
            ]
        ];
    }

}