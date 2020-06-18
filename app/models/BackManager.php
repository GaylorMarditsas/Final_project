<?php
use Controller\ControllerBack;
namespace projet\models;

class BackManager extends Manager
{
    //Pour récuperer l'id du dieu
    public function id()
    {
        return htmlspecialchars($_GET['id']);
    }
    //vue globale
    public function viewBack()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux');
        $req->execute();
        
        return $req;
    }
    //vue de la galerie
    public function galleryBack()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux INNER JOIN gallery ON dieux.id = gallery.god');
        $req->execute();
        
        return $req;
    }

    //Pour se connecter en tant qu'admin 
    public function login($pseudo, $password)
    {
            $bdd = $this->dbConnect();
            $login = $bdd ->prepare('SELECT id, password FROM user WHERE pseudo = :pseudo');
            $login->execute([':pseudo'  => $pseudo]);
            $login = $login ->fetch();

            if (password_verify($password, $login['password'])) {
                $_SESSION['admin'] = $login['id'];
                header('Location: indexBack.php?action=admin');
            } 
            else {}
    }
    ///////////////////////////////////////////             CRUD gods           ///////////////////////////////////////////////////////////////////////////////////
    //Pour créer un dieu
    public function create($img, $name, $description, $content, $image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO `dieux` (`id`, `name`, `description`, `content`, `image`) VALUES (NULL, :name, :description, :content, :image)");
        
        move_uploaded_file($img['tmp_name'],"app/public/images/" . $img['name']);
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image]);
        header("Location: indexBack.php?action=admin");
    }
    

    //Pour lire un dieu
    public function read($id)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("SELECT * FROM dieux WHERE id = :id");
        $req->execute([':id'=> $id]);
        $row = $req->fetchAll();
        if(!empty($row)) {
            return $row[0];
        } 
    }

    //Pour modifier un dieu
    public function updateImg($img, $name, $description, $content, $image)
    {       
        $id=$this->id();
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content, `image` = :image WHERE `dieux`.`id` = :id");
        move_uploaded_file($img['tmp_name'], "app/public/images/" . $img['name']);
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image, ':id'=>$id]);
        header("Location: indexBack.php?action=admin");
    }
    //Pour modifier un dieu sans changer son image
    public function update($name, $description, $content)
    {
        $id=$this->id();
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content WHERE `dieux`.`id` = :id");
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':id'=>$id]);
        header("Location: indexBack.php?action=admin");
    }
    //Pour supprimer un dieu
    public function delete()
    {
        $id=$this->id();
        //connexion à la bdd
        $bdd = $this->dbConnect();
        //requête pour récuperer le chemin de l'image dans le dossier 
        $image = $bdd->prepare("SELECT image FROM dieux WHERE `dieux`.`id` = :id");
        $image->execute([':id'=>$id]);
        $image = $image->fetch();

        $req = $bdd->prepare("DELETE FROM `dieux` WHERE `dieux`.`id` = :id");
                
            if ($req->execute([':id'=>$id])) {
                //Supression du dieu et de l'image associé
                unlink($image['image']);
                header("Location: indexBack.php?action=admin");
                
            }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //Pour ajouter une image a la galerie
    public function createImage($source, $name, $image_path, $resized_path)
    {
        
                //Enregistrement dans la base de données
                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `gallery` (`id`, `god`, `image`, `resized_image`)VALUES (NULL, :name, :image, :resized)");
                move_uploaded_file($source['tmp_name'],"app/public/images/gallery/" . $source['name']);
                move_uploaded_file($source['tmp_name'],"app/public/images/gallery/resized/" . $source['name']);
                $req->execute([':name'=> $name,':image'=> $image_path, ':resized'=>$resized_path]);
                header("Location: indexBack.php?action=gallery");

                    
    }
    //Voir pour généraliser le redimensionnement d'images pour l'utiliser indépendamment
    //Pour redimensionner les images si elles sont trop grandes
    // public function resizeImage($source, $resized_path, $name){
        
    // $path = "app/public/images/gallery/" . $source['name'];
    // $ext = pathinfo($source['name'], PATHINFO_EXTENSION);
    // $max_size = 400;
    // //Récuperer la taille de l'image
    // // [0]=>width    [1]=>height
    // $imageSize = getimagesize($path);
    // $width = $imageSize[0];
    // $height = $imageSize[1];
    // if ($width >= $height && $type != "height") {

        
    //     if ($max_size >= $width) {
    //         return 'Pas besoin de redimensionner !';
    //     }
    //     // nouvelle dimension depuis la largeur
    //     $new_width = $max_size;
    //     $reduction = (($new_width * 100) / $width);
    //     $new_height = round((($height * $reduction)/100), 0);
    // } else {
  
        
    //     if ($max_size >= $height) {
    //         return 'Pas besoin de redimensionner !';
    //     }
    //     // nouvelle dimension depuis la hauteur
    //     $new_height = $max_size;
    //     $reduction = (($new_height * 100) / $height);
    //     $new_width = round((($width * $reduction)/100), 0);
    // }
    // switch ($ext) {
    //     case 'jpg':
    //     case 'jpeg':
    //         $imageCreate = imagecreatefromjpeg($path);
    //     break;
  
    //     case 'png':
    //         $imageCreate = imagecreatefrompng($path);
    //     break;
    //   }
    //   $imageFinal = imagecreatetruecolor($new_width, $new_height);
    // if (imagecopyresampled($imageFinal, $imageCreate, 0, 0, 0, 0, $new_width, $new_height, $width, $height)) {
  
    //     // création de la nouvelle image
    //     switch ($ext) {
    //       case 'jpg':
    //       case 'jpeg':
    //         $quality = 100; // Pour les jpg/jpeg la qualité va de 0 à 100
    //         imagejpeg($imageFinal, $resized_path, $quality);
    //       break;
  
    //       case 'png':
    //         $quality = 9; //Pour les png la qualité va de 0 à 10
    //         imagepng($imageFinal, $resized_path, $quality); 
    //       break;
    //     }
    //     move_uploaded_file($source['tmp_name'],"app/public/images/gallery/resized/" . $source['name']);
    //     }
    //     header("Location: indexBack.php?action=gallery");
    // }
    //suppression d'image de la galerie
    public function deleteImage()
    {
        $id=$this->id();
        //connexion à la bdd
        $bdd = $this->dbConnect();
        //requête pour supprimer l'image dans le dossier 
        $image = $bdd->prepare("SELECT image, resized_image FROM gallery WHERE `gallery`.`id` = :id");
        $image->execute([':id'=>$id]);
        $image = $image->fetch();

        $req = $bdd->prepare("DELETE FROM `gallery` WHERE `gallery`.`id` = :id");
                
            if ($req->execute([':id'=>$id])) {
                //supprime le dieu et l'image dans le dossier
                unlink($image['image']);
                unlink($image['resized_image']);
                header("Location: indexBack.php?action=gallery");   
            }
    }
}