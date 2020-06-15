<?php
namespace projet\models;

class FrontManager extends Manager
{
    //vue globale
    public function viewFront()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM Dieux');
        $req->execute();
        
        return $req;
    }

    //vue pour la galerie
    public function viewGallery(){
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM dieux INNER JOIN gallery ON dieux.id = gallery.god');
        $req->execute();
        
        return $req;
    }
        //Pour récuperer l'id du dieu
    public function readFront($id){
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT * FROM dieux WHERE id ='$id' OR name='$id'");
            $req->execute();
            $row = $req->fetchAll();
            if(!empty($row)) {
                return $row[0];
            }
            
        }

        //barre de recherche pour matcher un dieu présent en bdd
        public function search($name){
            $bdd = $this->dbConnect();
            $req = $bdd->prepare("SELECT id, name, description, image FROM Dieux WHERE name LIKE :name");
            $req->execute([':name' => $name .'%']);
            $results= $req->fetchAll();
            echo json_encode($results);
            
        }
    
}
