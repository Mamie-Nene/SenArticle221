<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <form action="../models/addArticle.php" method="post">
         <h2> Formulaire d'ajout d'un article </h2>
            <div class="input-group">
                <label for="titre"> Titre de l'article </label> 
                <input type="text" name="titre" id="titre"/> 
            </div>
            <div class="input-group">
                <label for="contenu"> Contenu </label> 
                <textarea name="contenu" id="contenu">  </textarea> 
            </div>
            <div class="input-group">
                <label for="categorie"> catégorie </label>
                <input type="number" name="categorie" id="categorie">
           </div>
            <div class="input-group">
                <button button class="btn" type="submit" name="valider">VALIDER </button>
                <a href="../views/indexAdmin.php?action=gererarticles"> <button class="btn" type="button"> Annuler </button> </a>
            </div>
        </form>
    </body>
</html>
