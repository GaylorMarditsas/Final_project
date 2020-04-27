<?php

namespace projet\Controllers;

class ControllerBack
{
    public function id(){
        return $_GET['id'];
    }
    public function homeAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');
        $title = "Admin";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/home.php';
    }
    public function galleryBack()
    {
        $galleryBack = new \projet\models\BackManager();
        $galleryBack->galleryBack();
        $godsBack = new \projet\models\BackManager();
        $godsBack->viewBack();
        $title = "Galerie";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/galleryBack.php';
    }

    public function loginAdmin()
    {
        $loginBack = new \projet\Controllers\ControllerBack();
        $loginBack->verifyLogin();
        $error = "Ces identifiants sont incorrects";
        $title = "Login";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/login.php';
    }
    public function verifyLogin(){
        if (isset($_POST) && isset($_POST['pseudo'],$_POST['password'])
        && !empty($_POST)) {
            $pseudo = htmlentities($_POST['pseudo']);
            $password = htmlentities($_POST['password']);
            $login = new \projet\models\BackManager();
            $login->login($pseudo, $password);
        }
    }

    public function logoutAdmin()
    {
        $createBack = new \projet\Controllers\ControllerBack;
        $createBack->logout();
        $title = "Logout";

        require 'app/views/back/logout.php';
    }
    public function updateAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');
        $title = "Update";

        $updategod = new \projet\Controllers\ControllerBack();
        $updategod->updategod();

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/godUpdate.php';
    }
    public function createAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $creategod = new \projet\Controllers\ControllerBack();
        $creategod->creategod();
        
        $title = "Create";

        

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/godCreate.php';
    }
    public function deleteAdmin()
    {
        $deleteBack = new \projet\models\BackManager();
        $deleteBack->delete();

        require 'app/views/back/godDelete.php';
    }
    public function createGallery()
    {
        $createImage = new \projet\models\BackManager();
        $createImage->viewBack();

        $addGallery = new \projet\Controllers\ControllerBack();
        $addGallery->addGallery();
        $title = "Ajouter des images";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/galleryCreate.php';
    }
    public function deleteGallery()
    {
        $deleteImage = new \projet\models\BackManager();
        $deleteImage->deleteImage();

        require 'app/views/back/galleryDelete.php';
    }
    
    public function logout()
    {
        unset($_SESSION['admin']);
        session_destroy();
        header('Location: index.php');
    }
    //create a god
    public function creategod()
    {
        if (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image']) && !empty($_POST)){
                $img = $_FILES['image'];
                $name=htmlentities($_POST['name']);
                $description=htmlentities($_POST['description']);
                $content=htmlentities($_POST['content']);
                
                $image= "app/public/images/" . $img['name'];

                if (!strstr($img['type'], 'jpg') && !strstr($img['type'], 'jpeg') && !strstr($img['type'], 'png')) {
                    return false;
                }else {
                    $creategod = new \projet\models\BackManager();
                    $creategod->create($img, $name, $description, $content, $image);
                }      
        }
    }
    //update a god
    public function updategod()
    {
        if (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image'])
        && !empty($_FILES['image']['name'])){
            $img = $_FILES['image'];
            $id=$this->id();
            $name=htmlentities($_POST['name']);
            $description=htmlentities($_POST['description']);
            $content=htmlentities($_POST['content']);
            $image="app/public/images/". $img['name'];

            if (!strstr($img['type'], 'jpg') && !strstr($img['type'], 'jpeg') && !strstr($img['type'], 'png')) {
                return false;
            } else {
                $updateImg = new \projet\models\BackManager();
                $updateImg->updateImg($img, $name, $description, $content, $image);
            }
        }
            else if (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image'])
            && empty($_FILES['image']['name'])){
                $id=$this->id();
                $name=htmlentities($_POST['name']);
                $description=htmlentities($_POST['description']);
                $content=htmlentities($_POST['content']);

                $updategod = new \projet\models\BackManager();
                $updategod->update($name, $description, $content);
        }
    }
    //add pictures to the gallery
    public function addGallery()
    {
        if (isset($_POST['name'], $_FILES['image'])){
            $img = $_FILES['image'];
            $name=$_POST['name'];
            $image= "app/public/images/gallery/" . $img['name'];

                if (!strstr($img['type'], 'jpg') && !strstr($img['type'], 'jpeg') && !strstr($img['type'], 'png')){
                    return false;
                }
                else{
                    $addImg = new \projet\models\BackManager();
                    $addImg->createImage($img, $name, $image);
                }
            }
    }
}
    
