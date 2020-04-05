<?php
try {
    $bdd = new PDO('mysql:host=localhost; dbname=BaseBDe', 'root', '');

}
catch(exception $e) {
    echo 'Connexion à la base de données non établies';
    die('Erreur '.$e->getMessage());

}
?>