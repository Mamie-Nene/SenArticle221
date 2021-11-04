<?php
function parCategorie($var)
            {
        ?>
                <div id= "article"> 
                    <div>
                        <?php 
                            $articles = categoryArticle();
                            foreach ($articles as $article)
                            {
                                            //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                        ?>                                
                                <h2> <a href="articles.php?id= <?= $article['id'] ?> " > <?= $article['titre'] ?> </a> </h2>
                                <p> <?= $article['contenu'];
                            } 
                            ?> 
                            </p>
                    </div>
                </div>
                <div id="categorie">
                    <h2>Catégories</h2>
                    <ul>  
                        <?php 
                            $categories = getAllCategory();
                            foreach ($categories as $categorie)
                            {
                        ?> 
                                <li><a href="<?= $categorie['id'] ?>"><?=$categorie['libelle'] ?> </a> </li>
                        <?php 
                            } 
                        ?> 
                    </ul>     
                </div> 
        <?php 
            }
?>