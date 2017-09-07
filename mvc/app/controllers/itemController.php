<?php

namespace Tasks\controllers;

use Tasks\components\NotFoundException;
use Tasks\controllers\BaseController;
use Tasks\config\Main;

class ItemController extends BaseController
{
    public function actionGetItemById()
    {
        $baseUrl = (new Main())->getConfig()['common']['base_url'];

        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        try {
            $model->getById($this->getParam('id'));
            $this->sendWebResponse(['items/main'], $model->toArray(), true, $baseUrl);
        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true, $baseUrl);
        }

    }

    public function actionDelete()
    {

    }
    public function actionGetAllItems(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        $page =  $_GET['page']*3;

       $data =  array_slice( $model->getAll(), $page-3 , 3 );
        try {
            $this->sendWebResponse(['items/main'],$data , true, $baseUrl);
        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true, $baseUrl);
        }
    }

    public function actionGetFilterItems(){
      $user_name = $_POST['user_name'];
      $email = $_POST['email'];
      $status = $_POST['status'];
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        try {

            $this->sendWebResponse(['items/filter'], $model->getFilterTasks($user_name, $email, $status), true, $baseUrl);
        } catch (NotFoundException $e) {
            $this->sendWebResponse(['items/error'], [], true, $baseUrl);
        }
    }

    public function actionAddTask(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
            $this->sendWebResponse(['items/add_task'], '', true, $baseUrl);

    }
    public function actionEditTask(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $id = $_GET['id'];
        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        $model->getById($this->getParam('id'));
        $this->sendWebResponse(['items/edit_task'], $model->toArray(), true, $baseUrl);

    }

    public  function actionEditTaskInDB(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $id = $_GET['id'];
        $description = $_POST['description'];
        $status = $_POST['status'];

        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        $model->updateById($id, $description, $status);
        header("Location: {$baseUrl}item/showAll?page=1  ");
    }

    public function actionLogIn(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $this->sendWebResponse(['items/log_in'], '', true, $baseUrl);
    }

    public function actionAddTaskToDB(){

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            $image_width = $check[0];
            $image_height = $check[1];

            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
// Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }
// Check file size
        if ($_FILES["fileToUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }
// Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }
// Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        $this->setModel('items', "\\Tasks\\models\\ItemsModel");
        $model = $this->getModel('items');
        $data = $_POST;
        $img =  $baseUrl."uploads/".basename( $_FILES["fileToUpload"]["name"]);
            $model->addTask($data, $img);
         header("Location: {$baseUrl}item/showAll?page=1  ");

    }

    public function actionSignIn(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        if ($_POST['user_name'] === 'admin' && $_POST['password'] === '123'){
            $_SESSION['name'] = 'admin';
            header("Location: {$baseUrl}item/showAll?page=1  ");
        } else {
            header("Location: {$baseUrl}item/logIn ");
        }
    }

    public function actionLogOut(){
        $baseUrl = (new Main())->getConfig()['common']['base_url'];
        unset($_SESSION['name']);
        header("Location: {$baseUrl}item/showAll?page=1  ");
    }

}