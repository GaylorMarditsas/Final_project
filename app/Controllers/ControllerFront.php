<?php
namespace projet\Controllers;

class ControllerFront
{

    function home()
    {
        $homeFront = new \projet\models\FrontManager();
        $homeFront->viewFront();
        $title = "Home";

        require 'app/views/front/layout/head.php';
        require 'app/views/front/layout/header.php';
        require 'app/views/front/home.php';
        require 'app/views/front/layout/footer.php';

    }
    function contactFront(){

        
        $title = "Contact";

        require 'app/views/front/layout/head.php';
        require 'app/views/front/layout/header.php';
        require 'app/views/front/contact.php';
        require 'app/views/front/layout/footer.php';
    }
    function godsFront(){

        $godsFront = new \projet\models\FrontManager();
        $godsFront->viewFront();

        $searchFront = new \projet\Controllers\ControllerFront();
        $searchFront->searchFront();

        $title = "Dieux";

        require 'app/views/front/layout/head.php';
        require 'app/views/front/layout/header.php';
        require 'app/views/front/gods.php';
        require 'app/views/front/layout/footer.php';
    }
    function godFront(){

        $godFront = new \projet\models\FrontManager();
        $godFront->readFront('$id'); 

        $title = "Dieu";

        require 'app/views/front/layout/head.php';
        require 'app/views/front/layout/header.php';
        require 'app/views/front/god.php';
        require 'app/views/front/layout/footer.php';
    }
    function galleryFront(){

        $galleryFront = new \projet\models\FrontManager();
        $galleryFront->viewGallery();
        $godsFront = new \projet\models\FrontManager();
        $godsFront->viewFront();
        $title = "Galerie";

        require 'app/views/front/layout/head.php';
        require 'app/views/front/layout/header.php';
        require 'app/views/front/gallery.php';
        require 'app/views/front/layout/footer.php';
    }
    public function searchFront()
    {
        if (isset($_GET['search'])) {

            $name=htmlspecialchars($_GET['search']);
            
            $search = new \projet\models\FrontManager();
            $search->search($name);
        }
    }
}