<?php
    require_once 'models/mesFonctionsSql.php';
    class Controller{
        function __construct()
        {
        }
        public function showAccueil(){
            ?>
            <?php
            require 'views/article.php';
            afficherArticle();
             afficherCategorie();
        }
        public function showArticles(){
            $articles = getAllArticle();
            //$id=$articles['id'];
            readArticle($articles);
        }
        public function showCategories(){
            $id=$categories['id'];
            readArticle($id);
        }

    }
?>
