<?php
require_once("api_call.php");
    $limit = 1;
    class Article
{
    public $id;
    public $titre;
    public $contenu;
    public $categorie;
    public $dateCreation;
    public $dateModif;
    
    public static function getAllArticle(){
        $articles = CallAPI("GET","localhost:8000/articles");
        return $articles;
    }
    public static function getLimitArticle(){
        $articles = CallAPI("GET","localhost:8000/articles"); 
        return $articles;
    }
     public static function ArticleById($id){
        //on recupere la connexion à la bd
        $connexion=databaseConnexion::getDatabaseConnexion();
        $requete='SELECT * FROM Article WHERE id='.$id;
        //affiche en ligne (rows) et pour le la fonction query c'est pour executer la requete
        $donnees =$connexion->query($requete);
        $rows =$donnees->fetch();
        return $rows;
    }
     public static function categoryArticle($categorie)
    {
        $connexion=databaseConnexion::getDatabaseConnexion();
        $requete='SELECT * FROM Article where categorie='.$categorie;
        $donnees =$connexion->query($requete);
       //affiche en ligne (rows) et stockage du resultat dans un tableau associatif
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

}
?>
