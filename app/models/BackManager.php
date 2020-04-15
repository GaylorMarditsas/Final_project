<?php
namespace projet\models;

class BackManager extends Manager
{
    public function viewBack(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux');
        $req->execute();
        
        return $req;
    }

    public function galleryBack(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux INNER JOIN gallery ON dieux.id = gallery.god');
        $req->execute();
        
        return $req;
    }

    //for login as admin 
    public function login(){

        if (isset($_POST) && !empty($_POST)) {

            extract($_POST);
    
            $error = 'Ces identifiants ne correspondent pas !';
            $bdd = $this->dbConnect();
            $login = $bdd ->prepare('SELECT id, password FROM user WHERE pseudo = ?');
            $login->execute([$pseudo]);
            $login = $login ->fetch();

            if (password_verify($password, $login['password'])) {
                $_SESSION['admin'] = $login['id'];
                header('Location: indexBack.php?action=admin');
            } 
            else if (password_verify($password, $login['password'])){
                echo $error;
    
            }
        }
    }

    public function logout(){
        unset($_SESSION['admin']);
        session_destroy();
        header('Location: index.php');
    }

    //for create a god
    public function create()
    {
        if (isset($_POST)) {
            if (isset($_POST['name'])
            && isset($_POST['description'])
            && isset($_POST['content'])
            && isset($_FILES['image'])) {
                $img = $_FILES['image'];
                
                $name=$_POST['name'];
                $description=$_POST['description'];
                $content=$_POST['content'];
                $image= "app/public/images/" . $img['name'];

                $ext = strtolower(substr($img['name'], -3));
                $allow_ext = array('jpg','png');

                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `dieux` (`id`, `name`, `description`, `content`, `image`) VALUES (NULL, :name, :description, :content, :image)");
                
                if (in_array($ext, $allow_ext)) {
                    move_uploaded_file($img['tmp_name'],"app/public/images/" . $img['name']);
                    $req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image]);
                    header("Location: indexBack.php?action=admin");
                }
            }
        }
    }

    //for read a god
    public function read($id){
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT * FROM dieux WHERE id ='$id'");
        $req->execute();
        $row = $req->fetchAll();
        if(!empty($row)) {
            return $row[0];
        }
        
    }

    //for update a god
    public function update(){

        if(isset($_POST)){
            if(isset($_POST['name']) 
            && isset($_POST['description']) 
            && isset($_POST['content'])
            && isset($_FILES['image']) && !empty($_FILES['image']['name']))
            {
                //upload image
                $img = $_FILES['image'];
                 //gestion des format accepté
                $ext = strtolower(substr($img['name'], -3));
                $allow_ext = array('jpg','png');
                    if (in_array($ext, $allow_ext)) {
                        move_uploaded_file($img['tmp_name'], "app/public/images/" . $img['name']);
                    }

            $id=$_GET['id'];
            $name=$_POST['name'];
            $description=$_POST['description'];
            $content=$_POST['content'];
            $image="app/public/images/". $img['name'];

            $bdd = $this->dbConnect();
            $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content, `image` = :image WHERE `dieux`.`id` = :id");

                    if($req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image, ':id'=>$id])){
                    header("Location: indexBack.php?action=admin");
                }
                    
            }
            //si l'image n'est pas mise à jour
            else if(isset($_POST['name']) 
            && isset($_POST['description']) 
            && isset($_POST['content'])
            && isset($_FILES['image']) && empty($_FILES['image']['name']) ){

                $id=$_GET['id'];
            $name=$_POST['name'];
            $description=$_POST['description'];
            $content=$_POST['content'];

            $bdd = $this->dbConnect();
            $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content WHERE `dieux`.`id` = :id");

                    if($req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':id'=>$id])){
                    header("Location: indexBack.php?action=admin");
                }
            }
            
        }
    }

    //for delete a god
    public function delete(){
        
        $id=$_GET['id'];
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
    //gallery

    //for add image to the gallery
    public function createImage(){
        if (isset($_POST)) {
            if (isset($_POST['name'])
            && isset($_FILES['image'])) {
                $img = $_FILES['image'];
                
                $name=$_POST['name'];
                $image= "app/public/images/gallery/" . $img['name'];

                $ext = strtolower(substr($img['name'], -3));
                $allow_ext = array('jpg','png');

                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `gallery` (`id`, `god`, `image`)VALUES (NULL, :name, :image)");
                
                if (in_array($ext, $allow_ext)) {
                    move_uploaded_file($img['tmp_name'],"app/public/images/gallery/" . $img['name']);
                    $req->execute([':name'=> $name,':image'=> $image]);
                    header("Location: indexBack.php?action=gallery");
                }
            }
        
    
    }
}

    //for delete image from the gallery
    public function deleteImage(){
        
        $id=$_GET['id'];
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