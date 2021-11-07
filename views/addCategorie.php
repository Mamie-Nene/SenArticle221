 <!DOCTYPE HTML>
<html lang=fr>
    <head>
        <title> </title> 
        <link rel="stylesheet" type="text/css" href="../asset/style.css">
    </head>
    <body>
        <h1> Formulaire d'ajout d'une catégorie </h1>
        <form action="../models/addCategorie.php" method="post">
            <div class="input-group">
                <label for="libelle"> Libellé </label> 
                <input type="textarea" name="libelle" id="libelle"/> 
            </div>
            <div class="input-group">
                <button type="submit" name="valider" class="btn">VALIDER </button>
                <a href="../views/indexAdmin.php?action=gerercategories">  <button class="btn" type="button"> Annuler </button> </a>
            </div>
        </form>
    </body>
</html>
