<?php

namespace projet\Controllers;

class ControllerBack
{
    public function id()
    {
        return htmlspecialchars($_GET['id']);
    }
    //vue globale
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
    //vue de la galerie
    public function galleryBack()
    {
        $galleryBack = new \projet\models\BackManager();
        $galleryBack->galleryBack();
        $godsBack = new \projet\models\BackManager();
        $godsBack->viewBack();
        $title = "Galerie";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/galleryBack.php';
    }
    //pour se connectern en tant qu'admin
    public function loginAdmin()
    {
        $loginBack = new \projet\Controllers\ControllerBack();
        $loginBack->verifyLogin();
        $error = "Ces identifiants sont incorrects";
        $title = "Login";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/login.php';
    }

    public function verifyLogin()
    {
        if (isset($_POST) && isset($_POST['pseudo'],$_POST['password'])
        && !empty($_POST)) {
            $pseudo = htmlentities($_POST['pseudo']);
            $password = htmlentities($_POST['password']);
            $login = new \projet\models\BackManager();
            $login->login($pseudo, $password);
        }
    }
//vue de la deconnexion
    public function logoutAdmin()
    {
        $createBack = new \projet\Controllers\ControllerBack;
        $createBack->logout();
        $title = "Logout";

        require 'app/views/back/logout.php';
    }
    //vue de la modification d'un dieu
    public function updateAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $homeBack->read('$id');
        $title = "Update";

        $updategod = new \projet\Controllers\ControllerBack();
        $updategod->updategod();

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/godUpdate.php';
    }
    //vue de l'ajout d'un dieu
    public function createAdmin()
    {
        $homeBack = new \projet\models\BackManager();
        $homeBack->viewBack();
        $creategod = new \projet\Controllers\ControllerBack();
        $creategod->creategod();
        
        $title = "Create";

        

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/godCreate.php';
    }
    //vue de la suppression d'un dieu
    public function deleteAdmin()
    {
        $deleteBack = new \projet\models\BackManager();
        $deleteBack->delete();

        require 'app/views/back/godDelete.php';
    }
    //vue de l'ajout d'image dans la galerie
    public function createGallery()
    {
        $createImage = new \projet\models\BackManager();
        $createImage->viewBack();

        $errors = new \projet\Controllers\ControllerBack();
        $errors->addGallery();
        $title = "Ajouter des images";

        require 'app/views/back/layout/head.php';
        require 'app/views/back/layout/header.php';
        require 'app/views/back/galleryCreate.php';
    }
    //vue de la supression d'images dans la galerie
    public function deleteGallery()
    {
        $deleteImage = new \projet\models\BackManager();
        $deleteImage->deleteImage();

        require 'app/views/back/galleryDelete.php';
    }
    //déconnexion
    public function logout()
    {
        unset($_SESSION['admin']);
        session_destroy();
        header('Location: index.php');
    }
    //Creation de dieu
    public function creategod()
    {
        if (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image']) && !empty($_POST)) {
            $img = $_FILES['image'];
            $name=htmlentities($_POST['name']);
            $description=htmlentities($_POST['description']);
            $content=htmlentities($_POST['content']);
            $image= "app/public/images/" . strtolower($img['name']);

            //Vérification du mime type du fichier
            if(!empty($_FILES['image'])){
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $finfo = finfo_file($finfo, $img['tmp_name']);
            }
            

            if ($finfo === 'image/png' || $finfo === 'image/jpeg') {
                $creategod = new \projet\models\BackManager();
                $creategod->create($img, $name, $description, $content, $image);
            } elseif ($finfo === false) {
                return false;  
            }else {
                return false;
            }
        }
    }
    //Modifier un dieu
    public function updategod()
    {
        if (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image']) && !empty($_FILES['image']['name'])) {
            $img = $_FILES['image'];
            $id=$this->id();
            $name=htmlentities($_POST['name']);
            $description=htmlentities($_POST['description']);
            $content=htmlentities($_POST['content']);
            $image="app/public/images/". strtolower($img['name']);

            //Vérification du mime type du fichier
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $finfo = finfo_file($finfo, $img['tmp_name']);

            if ($finfo === 'image/png' || $finfo === 'image/jpeg') {
                $updateImg = new \projet\models\BackManager();
                $updateImg->updateImg($img, $name, $description, $content, $image);
            } elseif ($finfo === false) {
                return false;
            } else {
                return false;
            }
        } elseif (isset($_POST['name'], $_POST['description'], $_POST['content'], $_FILES['image'])
            && empty($_FILES['image']['name'])) {
            $id=$this->id();
            $name=htmlentities($_POST['name']);
            $description=htmlentities($_POST['description']);
            $content=htmlentities($_POST['content']);

            $updategod = new \projet\models\BackManager();
            $updategod->update($name, $description, $content);
        }
    }

    //Ajout d'image dans la galerie
    public function addGallery()
    {
        if (isset($_POST['name'], $_FILES['image'])) {
            $source = $_FILES['image'];
            $name =htmlentities($_POST['name']);
            $image_path = "app/public/images/gallery/" . strtolower($source['name']);
            $resized_path = "app/public/images/gallery/resized/" . strtolower($source['name']);

            //Vérification du mime type du fichier
                $finfo = finfo_open(FILEINFO_MIME_TYPE);
                $finfo = finfo_file($finfo, $source['tmp_name']);

                if ($finfo === 'image/png' || $finfo === 'image/jpeg') {
                    $addImg = new \projet\models\BackManager();
                    $addImg->createImage($source, $name, $image_path, $resized_path);
                    /*
                    la fonction ci-dessous redimensionne les images mais ne marche pas en prod sur heroku actuellement.
                    Je n'ai toujours pas trouvé de solutions au problème.
                    De ce fait dans mes vues j'appelle l'image non redimensionné pour que le site reste complètement utilisable
                    */
                    // $resizeImg = new \projet\models\BackManager();
                    // $resizeImg->resizeImage($source, $resized_path, $name);
                } elseif ($finfo === false) {
                    return false;

                } else {
                    return false;
                    
                }
                return $errors;
        }
    }
}