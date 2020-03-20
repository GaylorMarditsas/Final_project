<?php
namespace projet\models;

class FrontManager extends Manager
{
    public function viewFront()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM Dieux');
        $req->execute();
        
        return $req;
    }

    public function searchFront()
    {
        $bdd = $this->dbConnect();

        if (isset($_GET['search']) and !empty($_GET['search'])) {
            $search = htmlspecialchars($_GET['search']);
            $req = $bdd->prepare('SELECT * FROM Dieux WHERE name LIKE "%". $search ."%"');
            $req->execute();
        
        return $req;
        }
    }
}