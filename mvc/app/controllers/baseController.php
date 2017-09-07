<?php

namespace Tasks\controllers;

use System\baseView;

class BaseController
{
    private $model = [];

    private $view;

    public function __construct()
    {
        $this->view = new baseView();
    }

    public function sendWebResponse(array $views, $data, $includeHeader, $baseUrl)
    {
        if ($includeHeader) $this->view->load("parts/header", [ 'baseUrl' => $baseUrl]);

        foreach ($views as $view) {
            $this->view->load($view, ['data' => $data, 'baseUrl' => $baseUrl]);
        }

        if ($includeHeader) $this->view->load("parts/footer");
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