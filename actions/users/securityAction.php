<?php
// sécurité si l'utilisateur n'est pas inscrit il ne peux pas entrée sur le site.
session_start();
if(!isset($_SESSION['auth'])) {
    header('Location:login.php');
}