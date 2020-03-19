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
}