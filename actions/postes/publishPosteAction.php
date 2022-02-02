<?php
require('actions/database.php');

if(isset($_POST['validate'])) {
    if(!empty($_POST['title']) AND !empty($_POST['description'])){
        
        $poste_title = htmlspecialchars($_POST['title']);
        $poste_description = nl2br(htmlspecialchars($_POST['description']));
        $date_poste = date('d/m/Y');
        $id_author_poste = $_SESSION['id'];
        $pseudo_author_poste = $_SESSION['pseudo'];

        $insertPosteOnWebSite = $bdd->prepare('INSERT INTO postes(titre, description, id_auteur, pseudo_auteur, date_publication) VALUES (?, ?, ?, ?, ?)');
        $insertPosteOnWebSite->execute(array(
            $poste_title,
            $poste_description, 
            $id_author_poste,
            $pseudo_author_poste,
            $date_poste
            )
        );
        // Message de successe
        $successMsg = "Votre postes à bien été publier sur le site";

    } else {
        $err = "Veuillez remplir tous les champs ...";
    }
}
?>