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

    function login(){
        extract ($_POST);
    
    $error = 'Ces identifiants ne correspondent pas !';
    $bdd = $this->dbConnect();
    $login = $bdd ->prepare('SELECT id, password FROM user WHERE pseudo = ?');
    $login->execute([$pseudo]);
    $login = $login ->fetch();
    if(password_verify($password, $login['password'])){
        $_SESSION['user'] = $login['id'];
        header('Location: index.php');
    }else{
        return $error;
    }
    }



    function create()
    {
        if(isset($_POST['submit'])){
             if(isset($_POST['name'])) {
             }
            // && isset($_POST['description']) 
            // && isset($_POST['contenu']) 
            // && isset($_POST['image']))
            // {
            //     if(!empty($_POST['name']) 
            //     && !empty($_POST['description']) 
            //     && !empty($_POST['contenu'])){

            //         echo $name= $_POST['name'];
            //         echo $description= $_POST['description'];
            //         echo $contenu= $_POST['contenu'];
                    
            //     }else{
            //         echo "<script>alert('empty');</script>";
            //     }
            // }
            
        }
    }

    function read($id){
        $bdd = $this->dbConnect();
        $req = $bdd->query("SELECT * FROM dieux WHERE id ='$id'");
        $req->execute();
        $row = $req->fetchAll();
        if(!empty($row)) {
            return $row[0];
        }
        
    }

    function update(){
        if(isset($_POST['submit'])){
            if(isset($_POST['name']) 
            && isset($_POST['description']) 
            && isset($_POST['contenu']) 
            && isset($_POST['image']))
            {
                if(!empty($_POST['name']) 
                && !empty($_POST['description']) 
                && !empty($_POST['contenu'])
                && !empty($_POST['image'])){

                    echo $name= $_POST['name'];
                    echo $description= $_POST['description'];
                    echo $contenu= $_POST['contenu'];
                    echo $image= $_POST['image'];
                }else{
                    echo "<script>alert('empty');</script>";
                }
            }
        }
        // try {
        //     $bdd = $this->dbConnect();
        //     $req =  "UPDATE dieux set
        //             name = '$name',
        //             description = '$description', 
        //             content= '$content', 
        //             image = '$image'
        //             WHERE id=?";
        // $req->execute();
        
        // return $req;
        // }
        // catch(Exeption $e) {
        //     die('Erreur : ' . $e->getMessage());
        // }
    }

    function delete(){
        
    }
}