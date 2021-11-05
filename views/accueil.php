<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>

    </head>
    <body>
        <header>
            <div class="input-group">
                <a href="views/connexion.php"><button class="btn"> Connexion</a> </button>
                <a href="views/inscription.php"><button class="btn"> Inscription</a> </button>
                <hr>
            </div>
        </header>
        <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
        <div>        
            <?php 
if(!$_SESSION['username'])header("Location: ../index.php");
                
                $articles = Article::getAllArticle();
                    foreach ($articles as $article)
                    {
                        //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                    ?>                                
                        <h2> <a href="index.php?action=articles&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                        <p> <?= $article['contenu'];
                    } 
                    ?> 
        </div>
        <div>
            <h2>Catégories</h2>
            <ul>  
            <?php 
                
                $categories = Categorie::getAllCategory();
                foreach ($categories as $categorie)
                {
            ?> 
                <li><a href="<?= $categorie['id'] ?> " id="category"><?=$categorie['libelle'] ?> </a> </li>
            <?php 
                } 
            ?> 
            </ul>     
        </div>
    </body>
</html>
    