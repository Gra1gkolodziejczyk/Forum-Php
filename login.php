<?php 
    require('actions/database.php'); 
    require('actions/users/loginAction.php');
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <form method="POST">
    <?php if(isset($err)) { echo '<p>' . $err . '</p>'; } ?>
    <div>
        <label>Pseudo</label>
        <input type="text" name="pseudo">
    </div>
    <div>
        <label>Email</label>
        <input type="text" name="email">
    </div>
    <div>
        <label>Mot de passe</label>
        <input type="password" name="password">
    </div>
    <button type="submit" name="validate">Se connecter</button>
    <a href="signup.php">Je n'ai pas encore de compte...</a>
    </form>
</body>
</html>