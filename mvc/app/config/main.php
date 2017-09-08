<?php

namespace Tasks\config;

class Main
{
    public function getConfig()
    {
        return [
            'common' => [
                'base_url' => '/mvc/'
            ],
            'database' => [
                'user' => 'root',
                'password' => '',
                'db' => 'tasks',
                'host' => 'localhost',
                'driver' => 'mysqli'
            ]
        ];
    }

}