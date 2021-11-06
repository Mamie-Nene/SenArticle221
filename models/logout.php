<?php
session_start();
session_destroy();
echo'vous êtes deconnectés';
header('location:../index.php');
?>