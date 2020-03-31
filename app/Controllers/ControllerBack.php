<?php

namespace projet\Controllers;

class ControllerBack
{
    function homeAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');   
        $title = "Admin";

        require 'app/views/layout/head.php';
        require 'app/views/back/home.php';

    }

    function loginAdmin(){

        $loginBack = new \projet\models\BackManager();
        $loginBack->login();

        require 'app/views/back/login.php';
    }

    function updateAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');   
        $title = "Update";

        $updateBack = new \projet\models\BackManager();
        $updateBack->update(); 

        require 'app/views/layout/head.php';
        require 'app/views/back/godUpdate.php';

    }
    function createAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack(); 
        $title = "Create";

        $createBack = new \projet\models\BackManager();
        $createBack->create(); 

        require 'app/views/layout/head.php';
        require 'app/views/back/godCreate.php';

    }
}