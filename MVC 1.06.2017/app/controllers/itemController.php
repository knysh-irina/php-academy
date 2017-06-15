<?php

namespace ToilonShop\controllers;

use ToilonShop\components\NotFoundException;
use ToilonShop\controllers\BaseController;

class ItemController extends BaseController
{
    public function actionGetItemById()
    {
        $this->setModel('items', "\\ToilonShop\\models\\ItemsModel");
        $model = $this->getModel('items');
        try {

            $this->includeHeader();
            $this->includeTableOpen();
            $model->getById($this->getParam('id'));
            $this->sendWebResponse(['items/main'], $model->toArray(), true);
            $this->includeTableClose();
            $this->includeFooter();

        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true);
        }

    }

    public function actionDelete()
    {

    }
    public function actionGetItemByIds()
    {
        $this->setModel('items', "\\ToilonShop\\models\\ItemsModel");
        $model = $this->getModel('items');
        try {

            $param = explode(",", $this->getParam('id')) ;


            $this->includeHeader();
            $this->includeTableOpen();

            foreach ($param as $id){
                 $model->getById($id);
                array_push( $model->repository,  $model->toArray() );
                $this->sendWebResponse(['items/main'], $model->toArray(), true);
            }

            $this->includeTableClose();
            $this->includeFooter();

           var_dump( $model->repository);




//http://localhost/mvc/mvc/item/showItems?id=1,2,3,6,7

        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true);
        }

    }



}