<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <title>page d'accueil admin </title>
        <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="../lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/style-responsive.css" rel="stylesheet">
     
    </head>
    <body>
        <section id="container">
            <header class="header black-bg">
                <div class="sidebar-toggle-box">
                    <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
                </div>
                <a href="indexAdmin.php" class="logo"><b>SenArticle<span>221</span></b></a>
                    <!--logo end-->
                <div class="top-menu">
                    <ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../models/logout.php"> Deconnexion </a> </li>
                    </ul>
                    </div>
            </header>
            <aside>
                <div id="sidebar" class="nav-collapse ">
                <!-- sidebar menu start-->
                    <ul class="sidebar-menu" id="nav-accordion">
                        <p class="centered"><a href="profile.php"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
                        <h5 class="centered">Mame Néné</h5>
                        <li class="mt">
                            <a class="active" href="indexAdmin.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Accueil</span>                                
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Gestion Articles</span>
                            </a>
                            <ul class="sub">
                                <li><a href="addArticle.php">Ajouter Article</a></li>
                                <li><a href="editArticle.php">Modifier Article</a></li>
                                <li><a href="deleteArticle.php">Supprimer Article</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;">
                            <i class="fa fa-desktop"></i>
                            <span>Gestion Catégories</span>
                            </a>
                            <ul class="sub">
                                <li><a href="addCategorie.php">Ajouter Catégorie</a></li>
                                <li><a href="editCategorie.php">Modifier Catégorie</a></li>
                                <li><a href="deleteCategorie.php">Supprimer Catégorie</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
                     <section id="main-content">
                <section class="wrapper">
                    <div class="text-center"> 
                        <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 main-chart">  
                            <?php 
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
                        <div class="col-lg-3 ds">
                            <div class="donut-main">
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
                    </div>
                </section>
            </section>
                            <!--fin conteneur-->
        </section>
        <script src="../lib/jquery/jquery.min.js"></script>
        <script src="../lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../lib/jquery.scrollTo.min.js"></script>
        <!--common script for all pages-->
        <script src="../lib/common-scripts.js"></script>
    </body>
</html>
