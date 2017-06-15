<?php


namespace ToilonShop\controllers;


use ToilonShop\components\NotFoundException;
use ToilonShop\controllers\BaseController;

class adminController extends BaseController{


    //ДОДЕЛАТЬ!!!!!!!!
public function actionSetItem(){

    echo "It works!";
    $this->setModel('items', "\\ToilonShop\\models\\ItemsModel");
    $model = $this->getModel('items');
    try {
        $param =  $this->getParam('id');
        echo $param;
        $model->saveItem($param);

    } catch (NotFoundException $e) {
        $this->sendWebResponse(['items/error'], [], true);
    }
}

}