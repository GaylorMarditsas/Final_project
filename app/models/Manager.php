<?php

namespace projet\models;

class Manager
{
    //database connexion
    protected function dbConnect()
    {
        try {
            //$bdd= new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
            $bdd= new \PDO('pgsql:host=ec2-54-247-78-30.eu-west-1.compute.amazonaws.com;port=5432;dbname=d7ka6qi6do46kk', 'xiggkiboyskswu', '5835f48e95a00a252064803a9cdbc69565419869ce790f66192a689e517ec2ef');
            return $bdd;
        } catch (Exeption $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
