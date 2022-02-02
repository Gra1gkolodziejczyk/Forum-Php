<?php
require('actions/database.php');

// Validation du formulaire 
if(isset($_POST['validate']))
{
    // Vérification des champs bien compléter 
    if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['password']))
    { 
        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = htmlspecialchars($_POST['password']);

        // Vérifier si l'utilisateur existe (si le pseudo)
        $checkIfUserExists = $bdd->prepare('SELECT pseudo,email,password FROM users WHERE pseudo = ?');
        $checkIfUserExists->execute(array($user_pseudo));

        if($checkIfUserExists->rowCount() > 0) {
            // Récupérer les données de l'utilisateur
            $usersInfos = $checkIfUserExists->fetch();
            // Vérifier si le mot de passe est correct 
            if(password_verify($user_password, $usersInfos['password'])) {
                // Authentifier l'utilisateur sur le site
                $_SESSION['auth'] = true;
                $_SESSION['id'] = $usersInfos['id'];
                $_SESSION['pseudo'] = $usersInfos['pseudo'];
                $_SESSION['email'] = $usersInfos['email'];
                // Rediriger l'utilisateur vers la page d'accueil
                header("Location: index.php");
            } else {
                // message erreur 
                $err = 'Votre mot de passe est incorrect';
            }
        } else {
            // message erreur 
            $err = 'Votre speudo est incorrect';
        }
    } else {
        // message d'erreur
        $err = 'Veuillez compléter tous les champs...';
    }
}