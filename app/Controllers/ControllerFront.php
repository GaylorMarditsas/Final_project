<?php
namespace projet\Controllers;

class ControllerFront
{

    function home()
    {
        $homeFront = new \projet\models\FrontManager();
        $homeFront->viewFront();
        $title = "Home";

        require 'app/views/layout/head.php';
        require 'app/views/layout/header.php';
        require 'app/views/front/home.php';

    }
    function contactFront(){

        $title = "Contact";

        require 'app/views/layout/head.php';
        require 'app/views/layout/header.php';
        require 'app/views/front/contact.php';
    }
    function godsFront(){

        $godsFront = new \projet\models\FrontManager();
        $godsFront->viewFront();

        $searchFront = new \projet\models\FrontManager();
        $searchFront->searchFront();
        $title = "Dieux";

        require 'app/views/layout/head.php';
        require 'app/views/layout/header.php';
        require 'app/views/front/gods.php';
    }
    function galleryFront(){

        $title = "Galerie";

        require 'app/views/layout/head.php';
        require 'app/views/layout/header.php';
        require 'app/views/front/gallery.php';
    }
}