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
    
        if(isset($_POST)){
            if(isset($_POST['name']) 
            && isset($_POST['description']) 
            && isset($_POST['content']) 
            && isset($_POST['image']))
            {

            $name=$_POST['name'];
            $description=$_POST['description'];
            $content=$_POST['content'];
            $image=$_POST['image'];

                $bdd = $this->dbConnect();
                $req = $bdd->prepare("INSERT INTO `dieux` (`id`, `name`, `description`, `content`, `image`) VALUES (NULL, :name, :description, :content, :image)");
                
                if($req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image]))
                header("Location: indexBack.php?action=admin");
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
            && isset($_POST['image']))
            {
            
            $id=$_GET['id'];
            $name=$_POST['name'];
            $description=$_POST['description'];
            $content=$_POST['content'];
            $image="app/public/images/". $_POST['image'];

                $bdd = $this->dbConnect();

                $req = $bdd->prepare("UPDATE `dieux` SET `name` = :name, `description` = :description, `content` = :content, `image` = :image WHERE `dieux`.`id` = :id");
                
                if($req->execute([':name'=> $name, ':description'=> $description, ':content'=> $content, ':image'=> $image, ':id'=>$id]))
                header("Location: indexBack.php?action=admin");
            }
            
        }
    }

    //for delete a god
    public function delete(){
        
        $id=$_GET['id'];
            
        $bdd = $this->dbConnect();
        $req = $bdd->prepare("DELETE FROM `dieux` WHERE `dieux`.`id` = :id");
                
            if($req->execute([':id'=>$id]))
            header("Location: indexBack.php?action=admin");
    }
}