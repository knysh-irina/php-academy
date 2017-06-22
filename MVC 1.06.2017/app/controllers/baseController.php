<?php

namespace ToilonShop\controllers;

use System\baseView;

class BaseController
{
    private $model = [];

    private $view;

    public function __construct()
    {
        $this->view = new baseView();
    }


    public function includeHeader(){
        $this->view->load("parts/header");
    }
    public function includeFooter(){
        $this->view->load("parts/footer");
    }

    public function includeTableOpen(){
        $this->view->load("parts/tableOpen");
    }

    public function includeTableClose(){
        $this->view->load("parts/tableClose");
    }


    public function sendWebResponse(array $views, $data, $includeHeader)
    {

        foreach ($views as $view) {
            $this->view->load($view, $data);
        }

    }

    public function sendApiResponse($httpCode, $data)
    {
        echo json_encode($data);
        die();
    }

    /**
     * @return mixed
     */
    public function getModel($key)
    {
        if (!empty($this->model[$key])) {
            return $this->model[$key];
        }
        throw new \RangeException();
    }

    /**
     * @param mixed $model
     */
    public function setModel($key, $model)
    {
        $this->model[$key] = new $model;
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view)
    {
        $this->view = $view;
    }

    public function getParam($key, $defaultValue = null) {
        if (isset($_REQUEST[$key])) {
            return $_REQUEST[$key];
        }
        return $defaultValue;
    }

}