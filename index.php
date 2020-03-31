<?php
// //generate constante to the way of index.php
// define('ROOT', str_replace('index.php', '', $_SERVER['SCRIPT_FILENAME']));

// // separate parameters
// $params = explode('/', $_GET['p']);
// if($params[0] != ""){
//     $controller = ucfirst($params[0]);
    
//     $action = isset($params[1]) ? $params[1] : 'index';

//     require_once(ROOT. 'Controllers/'.$controller.'.php');

//     $controller = new $controller();

//     $controller->$action();

//     if(method_exists($controller, $action)){
//         $controller->$action();
//     }else{
//         html_response_code(404);
//         echo 'la page est pas la';
//     }

// }else{
    
// }

session_start();

//autoload.php generé avec composer
require_once __DIR__  . '/vendor/autoload.php';

try{
    $controllerFront = new \projet\Controllers\ControllerFront(); //objet controller

    if (isset($_GET['action'])){
        if($_GET['action'] == 'contact'){
            $controllerFront->contactFront();
        }
        else if($_GET['action'] == 'gods'){
            $controllerFront->godsFront();
        }
        else if($_GET['action'] == 'gallery'){
            $controllerFront->galleryFront();
        }

    } else{
        $controllerFront->home();
        
    }

} catch (Exeption $e){
   
}

