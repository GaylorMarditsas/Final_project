<?php

namespace projet\models;


class Manager
{
    //database connexion
    protected function dbConnect()
    {
        try {

            $host= "eu-cdbr-west-03.cleardb.net";
            $name = getenv('DB_DATABASE');
            $username = getenv('DB_USERNAME');
            $password = getenv('DB_PASSWORD');
            
            $dsn= 'mysql:host='. $host .';dbname=heroku_024ddffa1494702;charset=utf8';
            $bdd =new \PDO($dsn, 'bbaf9fef34d201', '0713b139');
   
            return $bdd;
        } catch (Exeption $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
//DB_USERNAME = bbaf9fef34d201
//DB_PASSWORD = 0713b139
//DB_HOST = eu-cdbr-west-03.cleardb.net