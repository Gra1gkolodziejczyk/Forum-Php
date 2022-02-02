<?php 
    require('actions/postes/publishPosteAction.php');
    require('actions/users/securityAction.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>

    <?php 
        if(isset($err)) {
            echo '<p>' . $err . '</p>';
        } elseif(isset($successMsg)) {
            echo '<p>' . $successMsg . '</p>';
        }
    ?>

    <form method="POST">
        <div>
            <label>Titre du poste</label>
            <input type="text" name="title">
        </div>
        <div>
            <label>Description du poste</label>
            <textarea name="description"></textarea>
        </div>
    </form>
    <button type="submit" name="validate">Publier</button>
</body>
</html>