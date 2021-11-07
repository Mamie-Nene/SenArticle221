<?php

class Categorie
{
    public $id;
    public $libelle;

    public static function getAllCategory()
    { 
         $connexion=databaseConnexion::getDatabaseConnexion();
            $requete='SELECT * FROM Categorie';
            $donnees =$connexion->query($requete);
            $rows =$donnees->fetchAll();
            return $rows;
     }
}
?> 
