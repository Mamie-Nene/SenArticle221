<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <section id="container">
            <!-- debut header -->
            <header class="header black-bg">
                <!--logo start-->
                <a href="pagination.php" class="logo"><b>SenArticle<span>221</span></b></a>
                <!--logo end-->
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="views/connexion.php"> Connexion </a> </li>
                    <li><a class="logout" href="views/inscription.php"> Inscription</a></li>
                    </ul>
                </div>
            </header>
            <!-- fin header -->
            <!-- debut conteneur -->
            <section id="main-content">
                <section class="wrapper">
                    <div class="text-center"> 
                        <h2 > Bienvenue à SenArticle221 </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 main-chart">        
                        <?php 
                        if(!empty($articles))
                        {
                            foreach ($articles as $articles)
                            {
                                    //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                            ?>                                
                                <h2> <a href="index.php?action=article&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                                <p> <?= $article['contenu'];
                            } 
                        }
                        ?> 
                             <div class="pagination">
                            <a href="pagination.php"> <button type="button"> Suivant </button></a>
                            <a href="pagination.php"> <button type="button"> Precedent </button></a>    
                            
                        </div>
                            
                        </div>
                       
                        <div class="col-lg-3 ds">
                            <div class="donut-main">
                                <h2>Catégories</h2>
                                <ul>  
                                <?php 
                                   // $categories = Categorie::getAllCategory();
                                    if (!empty($categories)){
                                        foreach ($categories as $categorie)
                                    {
                                ?> 
                                <li><a href="../index.php?action=article&id=<?= $categorie['id'] ?> " id="category"><?=$categorie['libelle'] ?> </a> </li>
                                <?php 
                                } }
                                ?> 
                                </ul>  
                            </div>    
                        </div>
                    </div>
                </section>
            </section>
            <!-- fin conteneur-->
        </section>
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../lib/jquery.scrollTo.min.js"></script>
        <!--common script for all pages-->
        <script src="../lib/common-scripts.js"></script>
    </body>
</html>
    