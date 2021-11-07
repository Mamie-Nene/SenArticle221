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
                        <h4 class="centered">Mame Néné</h4>
                        <li class="mt">
                            <a href="indexAdmin.php">
                            <i class="fa fa-dashboard"></i>
                            <span>Accueil</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  class="active" href="indexAdmin.php?action=gererArticles">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Articles</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="indexAdmin.php?action=gererCategories">
                            <i class="fa fa-dashboard"></i>
                            <span>Gestion Categories</span>                                
                            </a>
                        </li>
                        <li class="sub">
                            <a  href="indexAdmin.php?action=gererUsers">
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
                        <h2 class="text-center"> Liste des articles </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-12 mt">
                            <div class="content-panel ">
                            <table class="table table-hover"> 
                                <thead>
                                    <tr>
                                        <th id="titre"> Titre </th>
                                        <th id="contenu"> Contenu</th>
                                        <th id="dateCreation"> Date de creation </th>
                                        <th id="dateModif"> Date de modification </th>
                                        <th id="categorie"> Categorie </th>
                                        <th id="editeur"> Editeur </th>
                                        <th id="action"> Actions </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                            if(!empty($articles))
                            {
                                foreach ($articles as $article) 
                                {
                        ?>      <tr class="lien">
                                    <td > <?= $article['titre'] ?> </td>
                                    <td  > <?= $article['contenu'] ?> </td>
                                    <td> <?= $article['dateCreation'] ?> </td>
                                    <td> <?= $article['dateModification'] ?> </td>
                                    <td > <?= $article['categorie'] ?> </td>
                                    <td > <?= $article['editeur'] ?> </td>
                                    <td > <a class="btn btn-theme" href="indexAdmin.php?action=editArticle&id=<?=$article['id']?>"> Modifier </a> 
                                    <a class="btn btn-theme04" href="indexAdmin.php?action=deleteArticle&id=<?$article['id']?>">Supprimer </a> </td>
                                </tr>
                            <?php
                                }
                            } ?>
                            </table>
                             <a href="addArticle.php"> Ajouter un article </a> 
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
