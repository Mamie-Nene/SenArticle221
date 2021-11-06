<?php
    function afficherTableauUsers(){
        ?>
        <h1> Liste des utilisateurs </h1>
        <table class="table"> 
            <thead>
                <th id="tnom"> Nom </th>
                <th id="username"> Username</th>
                <th id="mdp"> Mot de passe </th>
                <th id="mail"> Mail </th>
                <th id="groupe"> Groupe </th>
                <th id="action"> Actions </th>
            </thead>
            <tbody>
                <?php 
                    $users = getAllUsers();
                    foreach ($users as $user) {
                        //LE $PHP AVEC ECHO PEUT ETRE REMPLACER PAR <?=
                ?>
                        <tr>
                        <td> <?= $user['nom'] ?> </td>
                        <td> <?= $user['username'] ?> </td>
                        <td> <?= $user['motDePasse'] ?> </td>
                        <td> <?= $user['mail'] ?> </td>
                        <td> <?= $user['groupe'] ?> </td>
                        <td> <a class="btn" href="editUser.php?id=<?=$user['id']?>"> Modifier </a> 
                         <a class="btn" href="deleteUser.php?id=<?$user['id']?>">Supprimer </a> </td>
                    </tr>
                    <?php }
                ?>
                
            </tbody>

        </table>
        <a class="btn" href="addUser.php"> Ajouter un utilisateur </a>
        <?php 
    }
?>