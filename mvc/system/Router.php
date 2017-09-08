<?php

namespace System;

use Tasks\config\Routes;
use Tasks\config\Main;

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

               if(strpos($_SERVER['REQUEST_URI'], '?' )){
                   list ($uri, $params) = explode("?", $_SERVER['REQUEST_URI']);

               }
               else{
                   $uri = $_SERVER['REQUEST_URI'];
               }


            if ($baseUrl . $url == $uri && $method == $_SERVER['REQUEST_METHOD']) {
                list ($controller, $action) = explode("/", $action);
                return ['controller' => $controller, "action" => $action];
            }
        }

    }

}