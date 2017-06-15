<?php

namespace System;

class System
{
    public static $controller;

    private static $db;

    public static function run()
    {
        try {
            $actions = Router::run();
            $controller = "ToilonShop\\controllers\\" . $actions['controller'] . "Controller";

            if (class_exists($controller)) {
                self::$controller = new $controller;
            } else {
                throw new \BadFunctionCallException();
            }

            self::$db = DB::get_instance();

            $action = strtolower("action" . $actions['action']);
            if (method_exists(self::$controller, $action)) {
                self::$controller->$action();
            } else {
                throw new \BadFunctionCallException();
            }

        } catch (\Exception $exception) {
           $error = new \ToilonShop\controllers\ErrorController();
           $error->actionHandleError($exception);
        }


    }
}