<?php
try {
    $bdd = new PDO('mysql: host=localhost; dbname=BaseBDE', 'root', '');

}
catch(exception $e) {
    echo 'Connexion à la base de données non établies';
    die('Erreur '.$e->getMessage());

}
?>