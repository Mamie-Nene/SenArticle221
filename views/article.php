<?php
    function afficherArticle()
    {
?>     
        <!DOCTYPE html>
        <html lang="FR">
            <head>
                <title>page d'accueil </title>
                <link rel="stylesheet" type="text/css" href="../style.css">
            </head>
            <body>
                <div class="input-group">
                    <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
                    <a href="views/connexion.php"><button class="btn"> Connexion</a> </button>
                    <a href="views/inscription.php"><button class="btn"> Inscription</a> </button>
                    <hr>
                </div>
                <?php 
                    $articles = getAllArticle();
                    foreach ($articles as $article)
                    {
                        //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                    ?>                                
                        <h2> <a href="index.php?action=articles&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                        <p> <?= $article['contenu'];
                    } 
                    ?> 
            </body>
        </html>
    <?php 
    }
            
    function afficherCategorie()
    {
    ?>
        <div class="input-group">
            <h2>Catégories</h2>
            <ul>  
            <?php 
            $categories = getAllCategory();
            foreach ($categories as $categorie)
            {
            ?> 
                <li><a href="<?= $categorie['id'] ?> " id="category"><?=$categorie['libelle'] ?> </a> </li>
                        <?php 
                            } 
                        ?> 
                    </ul>     
                </div> 
        <?php 
        }
    
?>
