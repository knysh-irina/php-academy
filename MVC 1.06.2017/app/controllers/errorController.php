<?php

namespace ToilonShop\controllers;
use ToilonShop\controllers\BaseController;

class ErrorController extends BaseController
{
    public function actionHandleError(\Exception $e)
    {
        echo "Error!!!! ", $e->getMessage();
    }

}