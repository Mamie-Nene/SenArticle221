<?php
    require '../models/mesFonctionsSql.php';
?> 
<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
    </head>
    <body>
        <h1> Formulaire d'ajout d'un article </h1>
        <form action="../models/addArticle.php" method="post">
            <div class="input-group">
                <label for="titre"> Titre de l'article </label> 
                <input type="text" name="titre" id="titre"/> 
            </div>
            <div class="input-group">
                <label for="contenu"> Contenu </label> 
                <textarea name="contenu" id="contenu">  </textarea> 
            </div>
            <div class="input-group">
                <label for="dateCreation"> date de creation </label> 
                <input type="date" name="dateCreation" id="dateCreation"> 
            </div>
            <div class="input-group">
                <label for="dateModif"> date de modification </label> 
                <input type="date" name="dateModif" id="dateModif"> 
            </div>
            <div class="input-group">
                <label for="categorie"> catégorie </label>
                <input type="number" name="categorie" id="categorie">
           </div>
            <div class="input-group">
                <button type="submit" value="valider">VALIDER </button>
                <a href="indexEditeurs.php"> <button class="btn"> Annuler </button> </a>
            </div>
        </form>
    </body>
</html>
