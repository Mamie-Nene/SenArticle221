<?session_start();
?>
<!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
        <link rel="stylesheet" type="text/css" href="../style.css">
    </head>
    <body>
        <form action="../models/modifyArticle.php" method="post">
         <h2> Formulaire de modification d'un article </h2>
         <? 
         if(!empty($article)){ //<?= $article['editeur'] 
        ?>
            <div class="input-group">
                <label for="titre"> Titre de l'article </label> 
                <input type="text" name="titre" id="titre" value=" <?= $article['titre'] ?>"/> 
            </div>
            <div class="input-group">
                <label for="contenu"> Contenu </label> 
                <input type="textarea" name="contenu" id="contenu"  value=" <?= $article['contenu']?> " /> 
            </div>
           
            <div class="input-group">
                <label for="categorie"> catégorie </label>
                <input type="number" name="categorie" id="categorie" value ="<?= $article['categorie']?>"/>
           </div>
           <?}  ?>
            <div class="input-group">
                <button button class="btn" type="submit" name="modifier">Modifier </button>
                <a href="../views/indexAdmin.php?action=gererarticles"> <button class="btn" type="button"> Annuler </button> </a>
            </div>
        </form>
    </body>
</html>
