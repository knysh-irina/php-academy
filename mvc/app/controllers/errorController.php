<?php

namespace Tasks\controllers;
use Tasks\controllers\BaseController;

class ErrorController extends BaseController
{
    public function actionHandleError(\Exception $e)
    {
        echo "Error!!!! ", $e->getMessage();
    }

}