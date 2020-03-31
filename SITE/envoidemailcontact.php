<!Doctype html>
<html lang="fr">

<head>
    <meta http-equiv="refresh" content="4; url=http://bdeepsiwislyon.com/SITE/contact.php">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Contact</title>

    <?php

    include 'lienIconeFooter.html';

    include 'stylesBarres.php';

    ?>
</head>

<body>

<?php

include 'overNavbarBde.html';

include 'navbarUserConnecte.html';

?>



<div class="container-fluid">

    <div class="formulaire" style="height: auto">
        <div class="container-fluid">
            <div style="text-align: center; margin-bottom: 5vh;">
                <h5>Contactez-nous !</h5>
                <h7> <em>Envoyez-nous un message ou cliquez <a href="mailto: bde@lyon.epsi.fr">ici</a>.</em></h7>
                <br>
                <small> <em> WEBDE EPSI/WIS LYON</em></small>
                <br>
                <br>
<?php


ini_set( 'display_errors', 1 );

error_reporting( E_ALL );

$mail = 'idrissa.ndiaye2000@gmail.com';
$sujet = "Contact via Site";
$message = 'Vous avez reçu un mail de : '. $_POST['pnom'] .' '. $_POST['nom'] .  "\n" . 'Son adresse mail : '. $_POST['email']  . "\n" . "\n" . 'Son message : ' . $_POST ['message'];
$entete = "Objet : " . $_POST['objContact'];

$success = mail($mail,$sujet,$message,$entete);


if (!$success) {
    $errorMessage = error_get_last()['message'];
    print_r($errorMessage);

    echo '<br>';
    echo "L'email n'a pas été envoyé !";
    echo '<br>';
    echo '<span style="color: red;font-size: 25px"> X </span>';
}else{
    echo '<br>';
    echo "L'email a bien été envoyé !";
    echo '<br>';
    echo '<span style="color: green; font-size: 25px"> V</span>';
}

?>
            </div>
        </div>

    </div>


    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.0489380537542!2d4.8043046154411755!3d45.77020947910582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea8ef0c7b4c5%3A0x2f21d25e2194b244!2sEPSI%20Lyon!5e0!3m2!1sfr!2sfr!4v1582191880880!5m2!1sfr!2sfr" id="map" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


    <?php

    include 'footer.html';
    ?>


