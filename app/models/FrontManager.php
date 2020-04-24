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

    //view for the gallery
    public function viewGallery(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux INNER JOIN gallery ON dieux.id = gallery.god');
        $req->execute();
        
        return $req;
    }
        //for read a god
    public function readFront($id){
            $bdd = $this->dbConnect();
            $req = $bdd->query("SELECT * FROM dieux WHERE id ='$id' OR name='$id'");
            $req->execute();
            $row = $req->fetchAll();
            if(!empty($row)) {
                return $row[0];
            }
            
        }
    public function searchFront()
    {
        if (isset($_GET['search'])) {
            $search=(String) trim($_GET['search']);
            $bdd = $this->dbConnect();
            $req = $bdd->prepare(
                "SELECT * FROM Dieux WHERE name LIKE ?",
                array("$search%")
            );
        
            $req->execute();
        dd($req);
        return $req;
            }
        }
}
