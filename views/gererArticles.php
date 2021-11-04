<?php
    function afficherTableauArticles(){
        ?>
        <h1> Liste des articles </h1>
        <table class="table"> 
            <thead>
                <th id="titre"> Titre </th>
                <th id="contenu"> Contenu</th>
                <th id="dateCreation"> Date de creation </th>
                <th id="dateModif"> Date de modification </th>
                <th id="categorie"> Categorie </th>
                <th id="action"> Actions </th>
            </thead>
            <tbody>
                <?php 
                    $articles = getAllArticle();
                    foreach ($articles as $article) {
                        //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                ?>
                        <tr>
                        <td> <?= $article['titre'] ?> </td>
                        <td> <?= $article['contenu'] ?> </td>
                        <td> <?= $article['dateCreation'] ?> </td>
                        <td> <?= $article['dateModification'] ?> </td>
                        <td> <?= $article['categorie'] ?> </td>
                        <td> <a class="btn" href="editArticle.php?id=<?=$article['id']?>"> Modifier </a> 
                        <a href="deleteArticle.php?id=<?$article['id']?>">Supprimer </a> </td>
                    </tr>
                    <?php }
                ?>
                
            </tbody>

        </table>
        <a href="addArticle.php"> Ajouter un article </a>
        <?php 
    }
   function afficherTableauCategories(){
        ?>
        <h1> Liste des categories </h1>
        <table class="table"> 
            <thead>
                <th id="libellé"> Libellé </th>
                <th id="action"> Actions </th>
            </thead>
            <tbody>
                <?php 
                    $categories = getAllCategory();
                    foreach ($categories as $categorie) {
                        //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                ?>
                        <tr>
                        <td> <?= $categorie['libelle'] ?> </td>
                        <td> <a href="modifyCategorie.php?id=<?=$categorie['id']?>"> Modifier </a> 
                         <a href="deleteCategorie.php?id=<?$categorie['id']?>">Supprimer </a> </td>
                    </tr>
                    <?php }
                ?>
                
            </tbody>

        </table>
        <a href="addCategorie.php"> Ajouter une categorie </a>
        <?php 
    }
?>