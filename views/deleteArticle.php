<?php
    include 'mesFonctionsSql.php';
    include 'article.php';
 
    require('../models/deleteArticle.php');
    function SupprimerArticle($rows){
?>
    <h1> Supprimer l'article </h1>
    <form action="index.php" method="post">
    <label> Titre de l'article </label> : <input type="text" name="titre" id="titre"/> </br>
    <label> Contenu </label> : <textarea name="contenu" id="contenu">  </textarea> </br>
    <label> date de creation </label>: <input type="text" name="datecreation" id="datecreation"> </br>
    <label> date de modification </label>: <input type="text" name="datemodif" id="datemodif"> </br>
    <label> catégorie </label>
    <select>
        <option> <?php $articles = getAllArticle();?> </option>
    </select> </br>
    <input type="submit" value="Valider">
       
            <label> </label>
    </form>
   <?php }
   $articles=updateArticle();
   ModifierTableau($articles);
?>