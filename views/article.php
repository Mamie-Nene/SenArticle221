<?php

            function afficherArticle()
            {
        ?>     
              <div id="article"> 
                    
                    <div>
                        <?php 
                            $articles = getAllArticle();
                            //articles.php?id=
                            foreach ($articles as $article)
                            {
                                            //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                        ?>                                
                                <h2> <a href="index.php?action=articles&id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                                <p> <?= $article['contenu'];
                            } 
                            ?> 
                            </p>
                    </div>
                </div>
            <?php 
            }
            
        function afficherCategorie()
        {
        ?>
                <div id="categorie">
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