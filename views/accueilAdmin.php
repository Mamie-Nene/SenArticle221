<!DOCTYPE html>
<html lang="FR">
    <head>

        <title>page d'accueil </title>
        <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <!--external css-->
        <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />        
        <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
        <!-- Custom styles for this template -->
        <link href="css/style.css" rel="stylesheet">
        <link href="css/style-responsive.css" rel="stylesheet">
     
    </head>
    <body>
        <header>
            <div class="input-group">
                <a href="../models/logout.php"><button class="btn"> Deconnexion </button></a> 
                <hr>
            </div>
        </header>
        <h2 class="text-center"> Bienvenue à SenArticle221 </h2>
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
                        <span>Gerer article</span>
                        </a>
                        <ul class="sub">
                            <li><a href="addArticle.php">add</a></li>
                            <li><a href="editArticle.php">modif</a></li>
                            <li><a href="deleteArticle.php">delete</a></li>
                            <li><a href="font_awesome.html">Font Awesome</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                        <i class="fa fa-desktop"></i>
                        <span>Gerer Catégorie</span>
                        </a>
                        <ul class="sub">
                            <li><a href="addCategorie.php">add</a></li>
                            <li><a href="editCategorie.php">modif</a></li>
                            <li><a href="deleteCategorie.php">delete</a></li>
                        </ul>
                    </li>
                    <li class="sub-menu">
                        <a href="javascript:;">
                        <i class="fa fa-cogs"></i>
                        <span>gerer user</span>
                        </a>
                        <ul class="sub">
                            <li><a href="addUser.php">add</a></li>
                            <li><a href="editUser.php">modif</a></li>
                            <li><a href="deleteUser.php">delete</a></li>    
                        </ul>
                    </li>
                </ul>
            <!-- sidebar menu end-->
            </div>
        </aside>
        <div>        
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
