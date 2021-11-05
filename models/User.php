<?php
class User{
      function getAllUsers(){ 
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Users';
        // et pour le la fonction query c'est pour executer (preparer) la requete
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    function getAllGroupe(){ 
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Groupe';
        // et pour le la fonction query c'est pour executer (preparer) la requete
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
    
}
?>