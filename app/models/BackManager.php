<?php
use Controller\ControllerBack;
namespace projet\models;

class BackManager extends Manager
{
    public function id()
    {
        return $_GET['id'];
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
            $login = $bdd ->prepare('SELECT id, password FROM user WHERE pseudo = ?');
            $login->execute([$pseudo]);
            $login = $login ->fetch();

            if (password_verify($password, $login['password'])) {
                $_SESSION['admin'] = $login['id'];
                header('Location: indexBack.php?action=admin');
            } 
            else {}
    }
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
        $req = $bdd->query("SELECT * FROM dieux WHERE id ='$id'");
        $req->execute();
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
                //supprime le dieu et l'image dans le dossier
                unlink($image['image']);
                header("Location: indexBack.php?action=admin");
                
            }
    }
    //for add image to the gallery
    public function createImage($img, $name, $image)
    {
                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `gallery` (`id`, `god`, `image`)VALUES (NULL, :name, :image)");
                move_uploaded_file($img['tmp_name'],"app/public/images/gallery/" . $img['name']);
                $req->execute([':name'=> $name,':image'=> $image]);
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