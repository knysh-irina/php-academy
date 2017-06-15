<?php

namespace System;

use ToilonShop\config\Routes;
use ToilonShop\config\Main;

class Router
{
    public function run()
    {
        $config = Routes::getRoutes();
        $baseUrl = (new Main())->getConfig()['common']['base_url'];

        foreach ($config as $conf) {
            $url = reset($conf);
            $action = key($conf);
            $method = next($conf);

            list ($uri, $params) = explode("?", $_SERVER['REQUEST_URI']);


        //  echo $baseUrl . $url . $uri .$method .$_SERVER['REQUEST_METHOD'].PHP_EOL;

            if ($baseUrl . $url == $uri && $method == $_SERVER['REQUEST_METHOD']) {
                list ($controller, $action) = explode("/", $action);
                return ['controller' => $controller, "action" => $action];
            }
        }

        //throw new \BadMethodCallException();
    }

}