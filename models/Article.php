<?php
    
    class Article
{
    public $id;
    public $titre;
    public $contenu;
    public $categorie;
    public $dateCreation;
    public $dateModif;
    
    public static function getAllArticle(){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Article ORDER BY id DESC';
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
    public static function getLimitArticle(){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Article ORDER BY id DESC LIMIT 5';
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
     public static function paginationNext(){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Article ORDER BY id ';
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
    public static function paginationPrevious(){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        //on met la requete oour récuperer tous les articles 
        $requete='SELECT * FROM Article ORDER BY id ';
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
    public static function getArticleById($id){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        $requete='SELECT * FROM Article WHERE id='.$id;
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetchAll();
        return $rows;
    }
     function categoryArticle($categorie)
    {
        $connexion=getDatabaseConnexion();
        $requete="SELECT * FROM Article where categorie='$categorie'";
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
    }
  

    function createArticle($titre, $contenu, $dateCreation, $dateModification, $categorie)
    { //si on met des donnes erronnees
       try {
        $connexion=getDatabaseConnexion();
        $requete="INSERT INTO Article (titre, contenu, dateCreation, dateModification, categorie)
                 VALUES ('$titre','$contenu','$dateCreation','$dateModification','$categorie')";
        $connexion ->exec($requete);
       }
       catch(Exception $e){
        die('Erreur $:' .$e->getMessage());
       }
    }
     function readArticle($id){
        $connexion=getDatabaseConnexion();
        //on met la requete oour récuperer l'article choisit
        $requete="SELECT * FROM Article where id==' .$id '";
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
        $rows =$donnees->fetchAll();
        return $rows;
        //if (!empty ($rows)){return $rows[0];}else {die ('article introuvable');}
    }
      function updateArticle($id, $titre, $contenu, $dateCreation, $dateModification, $categorie){
        //on use id car il faut savoir quelle article mettre a jour
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="UPDATE Article set 
                     titre='$titre', 
                     contenu='$contenu', 
                     dateCreation='$dateCreation', 
                     dateModification='$dateModification', 
                     categorie='$categorie' 
                     where id='$id' ";
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }

    }
    function deleteArticle($id){
        try {
            $connexion=getDatabaseConnexion();
            //on met la requete oour récuperer tous les articles 
            $requete="DELETE FROM Article where id='$id' ";
                     
            $donnees =$connexion->query($requete);
           }  
           catch(Exception $e){
            die('Erreur $:' .$e->getMessage());
           }
    }
}

?>
