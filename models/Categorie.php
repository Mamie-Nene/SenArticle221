<?php
//require_once "models/databaseConnexion.php";

class Categorie
{
    public $id;
    public $libelle;

    public static function getAllCategory(){ 
            $connexion=databaseConnexion::getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete='SELECT * FROM Categorie';
            // et pour le la fonction query c'est pour executer (preparer) la requete
            $donnees =$connexion->query($requete);
        //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
            $rows =$donnees->fetchAll();
            return $rows;
        }
    public static function createCategory($libelle){
                try {
                $connexion=getDatabaseConnexion();
                $requete="INSERT INTO Categorie (libelle) VALUES ('$libelle')";
                $connexion ->exec($requete);
                }
                catch(Exception $e){
                die('Erreur $:' .$e->getMessage());
                }
        }
    
    public static function readCategory($id)
        {
            $connexion=getDatabaseConnexion();
            $requete="SELECT * FROM Categorie where id='$id'";
            $donnees =$connexion->query($requete);
        //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
            $rows =$donnees->fetchAll();
            if (!empty ($rows))
            {
                return $rows[0];
            }
        }
    
    public static function updateCategory($id, $libelle){
            try {
                $connexion=getDatabaseConnexion();
                //on met la requete oour récuperer tous les articles 
                $requete="UPDATE Categorie set 
                        libelle='$libelle' 
                        where id='$id' ";
                $donnees =$connexion->query($requete);
            }  
            catch(Exception $e){
                die('Erreur $:' .$e->getMessage());
            }
            }
        
    public static function deleteCategory($id){
            try {
                $connexion=getDatabaseConnexion();
                //on met la requete oour récuperer tous les articles 
                $requete="DELETE FROM Categorie where id='$id' ";
                        
                $donnees =$connexion->query($requete);
            }  
            catch(Exception $e){
                die('Erreur $:' .$e->getMessage());
            }
        }
}
?> 