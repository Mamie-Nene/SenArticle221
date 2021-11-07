<?session_start()?>
<!DOCTYPE html>
<html lang="FR">
    <head>
        <title> Article </title>
        <link href="../asset/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="../asset/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <!-- Custom styles for this template -->
        <link href="../asset/css/style.css" rel="stylesheet">
        <link href="../asset/css/style-responsive.css" rel="stylesheet">
    </head>
    <body>
        <section id="container">
            <!-- debut header -->
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
            <!-- fin header -->
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
                            <a  href="indexAdmin.php?action=gererarticles">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Articles</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="indexAdmin.php?action=gerercategories">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Categories</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="indexAdmin.php?action=gererusers">
                            <i class="fa fa-user"></i>
                            <span>Gestion Utilisateurs</span>                                
                            </a>
                        </li>
                    </ul>
                    <!-- sidebar menu end-->
                </div>
            </aside>
            <!-- debut conteneur -->
            <section id="main-content">
                <section class="wrapper">
                    <div class="text-center"> 
                        <h2 > Bienvenue à SenArticle221 </h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-9 main-chart">        
                        <?php 
                        if(!empty($article))
                        {    //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                        ?>                                
                            <h2> <?= $article['titre'] ?> </h2>
                            <p> Publié le <?= $article['dateCreation'] ?> par <?= $article['editeur'] ?> </p>
                            <p> <?= $article['contenu'];
                            
                        }
                        ?> 
                        <div class="pagination">
                            <a href="indexAdmin.php?action=pagination"> <button type="button"> Suivant </button></a>        
                        </div>
                            
                        </div>
                       
                        <div class="col-lg-3 ds">
                            <div class="donut-main">
                                <h2>Catégories</h2>
                                <ul>  
                                <?php 
                                    if (!empty($categories)){
                                        foreach ($categories as $categorie)
                                    {
                                ?> 
                                <li><a href="indexAdmin.php?action=categorie&id=<?= $categorie['id'] ?> " id="category"><?=$categorie['libelle'] ?> </a> </li>
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
    
    </body>
</html>
    