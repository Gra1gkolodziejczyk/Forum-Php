<?php
session_start();
$_SESSION = [];
session_destroy();
header('Location: ../../login.php'); // detruire toutes les sessions pour rediriger vers login
                 //   ../../ <--- car il y a 2 dossier avant de tomber sur login.php.
?>