<?php
session_start();

//autoload.php generé avec composer
require_once __DIR__  . '/vendor/autoload.php';

if(file_exists(__DIR__ . '/.env')){
    $dotenv = \Dotenv\Dotenv::createimmutable(__DIR__);
    $dotenv->load();
}

try{
    $controllerBack = new \projet\Controllers\ControllerBack(); //objet controller

    if(isset($_GET['action']) && isset($_SESSION['admin'])){
    
        switch ($_GET['action']) {
          case 'admin':
            $controllerBack->homeAdmin();
            break;
          case 'update':
            if(isset($_GET['id'])){
                $controllerBack->updateAdmin();
            }else{
                $controllerBack->homeAdmin();
            }
            break;
          case 'create':
            $controllerBack->createAdmin();
            break;
        case 'delete':
            $controllerBack->deleteAdmin();
            break;
        case 'logout':
            $controllerBack->logoutAdmin();
            break;
        case 'gallery':
            $controllerBack->galleryBack();
            break;
        case 'createImage':
            $controllerBack->createGallery();
            break; 
        case 'deleteImage':
            $controllerBack->deleteGallery();
            break; 
        }
    }else{
        $controllerBack->loginAdmin();
    }
} catch (Exeption $e){
   
}
?>