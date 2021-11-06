<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <title>page d'accueil admin </title>
        <link href="../asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="../asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../asset/css/style.css" rel="stylesheet">
        <link href="../asset/css/style-responsive.css" rel="stylesheet">
     
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
                    <li><a class="logout" href="../models/logout.php"> Déconnexion </a> </li>
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
                        <li class="sub">
                            <a  href="gererArticles.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Articles</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="gererCategories.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Categories</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="gererUsers.php">
                            <i class="fa fa-user"></i>
                            <span>Gestion Utilisateurs</span>                                
                            </a>
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
        <script src="../asset/lib/jquery/jquery.min.js"></script>
        <script src="../asset/lib/bootstrap/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../asset/lib/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../asset/lib/jquery.scrollTo.min.js"></script>
        <!--common script for all pages-->
        <script src="../asset/lib/common-scripts.js"></script>
    </body>
</html>
