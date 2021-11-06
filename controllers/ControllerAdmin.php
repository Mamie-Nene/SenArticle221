<?php
    require_once "../models/databaseConnexion.php";
    require_once '../models/Article.php';
    require_once '../models/Categorie.php';
    class ControllerAdmin{
        function __construct()
        {
        }
        public function showAccueil()
        {
            $articles = Article::getAllArticle();
            $categories= Categorie::getAllCategory();
        require_once '../views/accueilAdmin.php';
        }
        public function showArticles(){
            
            
        }
        public function showCategories(){
            $categories = getAllCategory();
            $id=$categories['id'];
            readArticle($id);
        }
        public function showCrudArticle(){
            require_once '../views/gererArticles.php';
            afficherTableauArticles();
        }
        public function showCrudCategorie(){  
            afficherTableauCategories();
        }
        public function showCrudUser(){
            require_once '../views/gererUser.php';
            afficherTableauUsers();
        }
    }
?>