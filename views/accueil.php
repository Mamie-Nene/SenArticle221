<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <link href="asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="asset/css/style.css" rel="stylesheet">
        <link href="asset/css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <section id="container">
            <!-- debut header -->
            <header class="header black-bg">
                <!--logo start-->
                <a href="index.php" class="logo"><b>SenArticle<span>221</span></b></a>
                <!--logo end-->
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                    <li><a class="log" href="views/connexion.php"> Connexion </a> </li>
                    <li><a class="log1" href="views/inscription.php"> Inscription</a></li>
                    </ul>
                </div>
            </header>
            <!-- fin header -->
            <!-- debut conteneur -->
            <section id="main-content1">
                <section class="wrapper">
                    <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
                    <div class="row">
                        <div class="col-lg-9 "> 
                        <?php 
                        if(!empty($articles))
                        {
                            foreach ($articles as $article)
                            {   ?>                                
                                <h2> <a class="lien" href="index.php?action=article&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                                <p class="lien" > <?= substr($article['contenu'], 0, 300) . '...';
                            } 
                        }   ?> 
                        <div class="pagination">
                            <a class="lien" href="index.php?action=pagination"> <button type="button"> Suivant </button></a>        
                        </div>
                        </div>
                        <div class= "ds">
                            
                            <h2>Catégories</h2>
                            <ul>  
                                <?php 
                                if (!empty($categories))
                                {
                                    foreach ($categories as $categorie)
                                    {?> 
                                        <li> <a href="index.php?action=categorie&id=<?= $categorie['id'] ?> " id="category"> <?=$categorie['libelle'] ?> </a> </li>
                                    <?php 
                                    } 
                                }?> 
                            </ul>  
                            
                        </div>
                    </div>
                </section>
            </section>
            <!-- fin conteneur-->
        </section>
    
    </body>
</html>
    
