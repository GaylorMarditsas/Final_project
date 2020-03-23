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

    function create($name, $description, $content, $image){
        try {
            $bdd = $this->dbConnect();
        $req = $bdd->prepare('INSERT INTO dieux (name, description, content, image)');
        $req->execute();
        
        return $req;
        }
        catch(Exeption $e) {
            die('Erreur : ' . $e->getMessage());
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

    function update($id, $name, $description, $content, $image){
        try {
            $bdd = $this->dbConnect();
            $req =  "UPDATE dieux set
                    name = '$name',
                    description = '$description', 
                    content= '$content', 
                    image = '$image'
                    WHERE id=?";
        $req->execute();
        
        return $req;
        }
        catch(Exeption $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }

    function delete(){
        
    }
}