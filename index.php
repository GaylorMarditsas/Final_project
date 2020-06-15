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

    if(isset($_GET['action'])){
    
        switch ($_GET['action']) {
          case 'contact':
            $controllerFront->contactFront();
            break;
          case 'gods':
            $controllerFront->godsFront();
            break;
          case 'search':
            $controllerFront->searchFront();
            break;
        case 'gallery':
            $controllerFront->galleryFront();
            break;
        case 'god':
            $controllerFront->godFront();
            break;
        case 'mentions':
            $controllerFront->mentionsLegales();
            break;
        case 'cgu':
            $controllerFront->cgu();
            break; 
        }
    }else{
        $controllerFront->home();
    }
        
    

} catch (Exeption $e){
   
}

