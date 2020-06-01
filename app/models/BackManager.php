<?php
use Controller\ControllerBack;
namespace projet\models;

class BackManager extends Manager
{
    public function id()
    {
        return htmlspecialchars($_GET['id']);
    }
    public function viewBack()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux');
        $req->execute();
        
        return $req;
    }

    public function galleryBack()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux INNER JOIN gallery ON dieux.id = gallery.god');
        $req->execute();
        
        return $req;
    }

    //for login as admin 
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
    //for create a god
    public function create($img, $name, $description, $content, $image)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("INSERT INTO `dieux` (`id`, `name`, `description`, `content`, `image`) VALUES (NULL, :name, :description, :content, :image)");
        
        move_uploaded_file($img['tmp_name'],"app/public/images/" . $img['name']);
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image]);
        header("Location: indexBack.php?action=admin");
    }
    

    //for read a god
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

    //for update a god
    public function updateImg($img, $name, $description, $content, $image)
    {       
        $id=$this->id();
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content, `image` = :image WHERE `dieux`.`id` = :id");
        move_uploaded_file($img['tmp_name'], "app/public/images/" . $img['name']);
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image, ':id'=>$id]);
        header("Location: indexBack.php?action=admin");
    }
    //update a god without update his picture
    public function update($name, $description, $content)
    {
        $id=$this->id();
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content WHERE `dieux`.`id` = :id");
        $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':id'=>$id]);
        header("Location: indexBack.php?action=admin");
    }
    //for delete a god
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
                //delete god and the associated picture
                unlink($image['image']);
                header("Location: indexBack.php?action=admin");
                
            }
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    //for add image to the gallery
    public function createImage($source, $name, $image_path, $resized_path)
    {
        
                //save in the database
                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `gallery` (`id`, `god`, `image`, `resized_image`)VALUES (NULL, :name, :image, :resized)");
                move_uploaded_file($source['tmp_name'],"app/public/images/gallery/" . $source['name']);
                $req->execute([':name'=> $name,':image'=> $image_path, ':resized'=>$resized_path]);
                    //header("Location: indexBack.php?action=gallery");
    }
    public function resizeImage($source, $resized_path, $name){
        
    $path = "app/public/images/gallery/" . $source['name'];
    $ext = pathinfo($source['name'], PATHINFO_EXTENSION);
    var_dump($source);
    $max_size = 400;
    //get the data of the size
    // [0]=>width    [1]=>height
    $imageSize = getimagesize($path);
    var_dump($imageSize);
    $width = $imageSize[0];
    $height = $imageSize[1];
    if ($width >= $height && $type != "height") {

        
        if ($max_size >= $width) {
            return 'no_need_to_resize';
        }
        // new dimension from the width
        $new_width = $max_size;
        $reduction = (($new_width * 100) / $width);
        $new_height = round((($height * $reduction)/100), 0);
    } else {
  
        
        if ($max_size >= $height) {
            return 'no_need_to_resize';
        }
        // new dimension from the height
        $new_height = $max_size;
        $reduction = (($new_height * 100) / $height);
        $new_width = round((($width * $reduction)/100), 0);
    }
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $imageCreate = imagecreatefromjpeg($path);
        break;
  
        case 'png':
            $imageCreate = imagecreatefrompng($path);
        break;
      }
      $imageFinal = imagecreatetruecolor($new_width, $new_height);
    if (imagecopyresampled($imageFinal, $imageCreate, 0, 0, 0, 0, $new_width, $new_height, $width, $height)) {
  
        // replace for image in jpg or png
        switch ($ext) {
          case 'jpg':
          case 'jpeg':
            $quality = 100; // for jpg||jpeg quality is evaluated from 1 to 100
            imagejpeg($imageFinal, $resized_path, $quality);
          break;
  
          case 'png':
            $quality = 9; //for png quality is evaluated from 1 to 9
            imagepng($imageFinal, $resized_path, $quality); 
          break;
        }
        move_uploaded_file($source['tmp_name'],"app/public/images/gallery/resized/" . $source['name']);
    }
    //save in the database
    
    
    header("Location: indexBack.php?action=gallery");
    }
    //for delete image from the gallery
    public function deleteImage()
    {
        $id=$this->id();
        //connexion à la bdd
        $bdd = $this->dbConnect();
        //requête pour supprimer l'image dans le dossier 
        $image = $bdd->prepare("SELECT image FROM gallery WHERE `gallery`.`id` = :id");
        $image->execute([':id'=>$id]);
        $image = $image->fetch();

        $req = $bdd->prepare("DELETE FROM `gallery` WHERE `gallery`.`id` = :id");
                
            if ($req->execute([':id'=>$id])) {
                //supprime le dieu et l'image dans le dossier
                unlink($image['image']);
                header("Location: indexBack.php?action=gallery");   
            }
    }
}