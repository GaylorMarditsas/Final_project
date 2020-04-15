<?php

namespace projet\Controllers;

class ControllerBack
{
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
    function galleryBack(){

        $galleryBack = new \projet\models\BackManager();
        $galleryBack->galleryBack();
        $godsBack = new \projet\models\BackManager();
        $godsBack->viewBack();
        $title = "Galerie";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/galleryBack.php';
    }

    public function loginAdmin(){

        $loginBack = new \projet\models\BackManager();
        $loginBack->login();
        $title = "Login";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/login.php';
    }

    public function logoutAdmin()
    {

        $createBack = new \projet\models\BackManager();
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

        $updateBack = new \projet\models\BackManager();
        $updateBack->update(); 

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/godUpdate.php';

    }
    public function createAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack(); 
        $title = "Create";

        $createBack = new \projet\models\BackManager();
        $createBack->create(); 

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
    public function createGallery(){
        $createImage = new \projet\models\BackManager();
        $createImage->viewBack();
        $createImage->createImage();
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
}