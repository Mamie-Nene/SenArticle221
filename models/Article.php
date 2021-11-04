<?php
class Article
{
    public $id;
    public $titre;
    public $contenu;
    public $categorie;
    public $dateCreation;
    public $dateModif;
    
    public function afficherArticle()
    {
        $articles = getAllArticle();
        foreach ($articles as $article)
        {
            //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
            ?>                                
            <h2> <a href="index.php?action=articles&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
            <p> <?= $article['contenu'];
        } 
    }
}
?>