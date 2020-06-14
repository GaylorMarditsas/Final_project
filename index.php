<?php

session_start();

//autoload.php generé avec composer
require_once __DIR__  . '/vendor/autoload.php';

if(file_exists(__DIR__ . '/.env')){
    $dotenv = \Dotenv\Dotenv::createimmutable(__DIR__);
    $dotenv->load();
}

try{
    $controllerFront = new \projet\Controllers\ControllerFront(); //objet controller

    if (isset($_GET['action'])){
        if($_GET['action'] == 'contact'){
            $controllerFront->contactFront();
        }
        else if($_GET['action'] == 'gods'){
            $controllerFront->godsFront();
        }
        else if($_GET['action'] == 'search'){
            $controllerFront->searchFront();
        }
        else if($_GET['action'] == 'gallery'){
            $controllerFront->galleryFront();
        }
        else if($_GET['action'] == 'god'){
            $controllerFront->godFront();
        }

    } else{
        $controllerFront->home();
        
    }

} catch (Exeption $e){
   
}

