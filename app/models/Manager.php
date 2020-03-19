<?php

namespace projet\models;

class Manager
{
    //database connexion
    protected function dbConnect()
    {
        try {
            $bdd= new \PDO('mysql:host=localhost;dbname=projet;charset=utf8', 'root', '');
            return $bdd;
        } catch (Exeption $e) {
            die('Erreur : ' . $e->getMessage());
        }
    }
}
