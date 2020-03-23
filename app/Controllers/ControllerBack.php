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
    function updateAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');   
        $title = "Update";

        require 'app/views/layout/head.php';
        require 'app/views/back/godUpdate.php';

    }
}