<?php
session_start();
if(!isset($_SESSION['email'])){
    header('Location:accueil.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>

<?php require('bdd.php')// Appelle de la connexion à la BDD?>


<h1>Dashboard</h1>

<?php
echo $_SESSION['nom'];
echo '<br>';
echo 'Le estadmin : ';
echo $_SESSION['estadmin'];
echo '<br>';
echo 'Le estpresident : ';
echo $_SESSION['estpresident'];

?>

<a href="deconnection.php">Déconnexion</a>

</body>
</html>