<?php
require('actions/database.php');

// Validation du formulaire 
if(isset($_POST['validate']))
{
    // Verification des champs bien completer 
    if(!empty($_POST['pseudo']) AND !empty($_POST['password']) AND !empty($_POST['email']))
    { 
        // Les données de l'user
        $user_pseudo = htmlspecialchars($_POST['pseudo']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // checker si l'utilisateur existe ou non déjà dans la BDD
        $checkIfUserAlreadyExists = $bdd -> prepare('SELECT pseudo, email FROM users WHERE pseudo = ? AND email = ?');
        $checkIfUserAlreadyExists->execute(array($user_pseudo, $user_email));

        // Insserer l'utilisateur dans la bdd
        if($checkIfUserAlreadyExists->rowCount() == 0){
            $inssertUserOnWebsite = $bdd->prepare('INSERT INTO users (pseudo, email, password) VALUES(?, ?, ?)');
            $inssertUserOnWebsite->execute(array(
                $user_pseudo,
                $user_email,
                $user_password)
            );

            // Recuperer les infos de l'utilisateur 
            $getInfosOfThisUserReq = $bdd->prepare('SELECT id,pseudo,email FROM users WHERE pseudo = ?');

            $getInfosOfThisUserReq->execute(array($user_pseudo));

            $usersInfos = $getInfosOfThisUserReq->fetch();

            // Authentifier l'utilisateur sur le site
            $_SESSION['auth'] = true;
            $_SESSION['id'] = $usersInfos['id'];
            $_SESSION['pseudo'] = $usersInfos['pseudo'];
            $_SESSION['email'] = $usersInfos['email'];

            // rediriger l'utilisateur apres le click sur S'inscrire sur l'accueil
            header("Location: index.php");
        } 
        else 
        {
            // message d'erreur
            $err = "Le speudo ou l'email est deja utiliser.. ";
        }
    }
    else 
    {
        // message d'erreur
        $err = 'Veuillez compléter tous les champs...';
    }
}