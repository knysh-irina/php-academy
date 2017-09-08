<?php

namespace System;

use Tasks\config\Main;
use System\dsnFabric;

class DB
{
    static $instanse;

    static private function construct()
    {
       $config = Main::getConfig()['database'];

        $dsnFabric = dsnFabric::getDsn(
            $config['driver'],
            $config['host'],
            $config['db']
        );

        self::$instanse = new \PDO( $dsnFabric->getConnectionString() , $config['user'], $config['password']);
    }

    static function get_instance()
    {
        if (!isset(self::$instanse))
        {
            self::construct();
        }
        return self::$instanse;
    }
}