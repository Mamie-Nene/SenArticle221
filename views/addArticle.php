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
            <label for="titre"> Titre de l'article </label> :
            <input type="text" name="titre" id="titre"/> </br>
            <label for="contenu"> Contenu </label> :
            <textarea name="contenu" id="contenu">  </textarea> </br>
            <label for="dateCreation"> date de creation </label> :
            <input type="date" name="dateCreation" id="dateCreation"> </br>
            <label for="dateModif"> date de modification </label> : 
            <input type="date" name="dateModif" id="dateModif"> </br>
            <label for="categorie"> catégorie </label>
            <select>
                <option> 
                    <?php 
                        $categories = getAllCategory();
                        echo $categories[' libelle '] ;
                    ?> 
                </option>
            </select> </br>
            <button type="submit" value="valider">
        </form>
    </body>
</html>