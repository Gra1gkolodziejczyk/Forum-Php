<?php 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=Forum_php_sql;charset=utf8;', 'root', 'root');
} catch (Exception $e) {
    die("Une erreur à été trouvé : " . $e->getMessage());
}
?>