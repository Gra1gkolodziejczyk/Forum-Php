<?php require('actions/users/signupAction.php'); ?>

<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <form method="POST">

        <?php
            if(isset($err)) {  
                echo '<p>' . $err . '</p>'; 
            }
        ?>

        <div>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo">
        </div>
            <label for="">Email</label>
            <input type="text" name="email">
        </div>
        <div>
            <label for="">Mot de passe</label>
            <input type="password" name="password">
        </div>
        <button type="submit" name="validate">S'inscrire</button>
         <a href="login.php">J'ai déjà un compte ... </a>
    </form>
</body>
</html>