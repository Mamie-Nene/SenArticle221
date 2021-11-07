<?php
class User{
    public static function getAllUsers()
    { 
        $connexion=databaseConnexion::getDatabaseConnexion();
        $requete='SELECT * FROM Users';
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    public static function getAllGroupe()
    { 
        $connexion=databaseConnexion::getDatabaseConnexion();
        $requete='SELECT * FROM Groupe';
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
    
}
?>
