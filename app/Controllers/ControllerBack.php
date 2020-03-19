<?php

namespace projet\Controllers;

class ControllerBack
{
    function homeAdmin()
    {
        $homeFront = new \projet\models\BackManager();
        $homeFront->viewBack();
        $title = "Home";

        
        require 'app/views/back/home.php';

    }
}