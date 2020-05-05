<!DOCTYPE html>


<html>

<?php
session_start();
?>


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/styleAccueil.css">
    <link rel="stylesheet" href="css/styleOverNavbar.css">
    <link rel="stylesheet" href="css/barrePresentation_style.css">

    <?php
    
    include 'lienIconeFooter.html';
    
    ?>

    <?php
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            $stbdeBD = new PDO("mysql:host=$servername;dbname=basebde", $username, $password);

    
    
    $POST = $stbdeBD->query('SELECT * FROM post');
        ?>


    <title>Accueil</title>
</head>

<body style="background-image:url(img/licorne-dab.png)">

    <div class="container-fluid" style="padding:0">

        <?php
        include 'overNavbar.php';

        include 'navbar.php';

        include 'barrePresentation.php';
        ?>



    <div style="display: block;
    text-align: center;
    margin-top: 10vh">
        <iframe width="900" height="500" src="https://www.youtube.com/embed/ulERa8BcNhk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>


    <div class="filActu">
        <h6 style="text-align: center">Fil d'actualité</h6>

        <?php
                
            while($donnees = $POST->fetch() ){
                                
                echo '<div class="post">
                <div class="headerPost">
                    <div class="logos"></div>
                    <div class="texte"><b>WEBDE</b></div>
                    <div class="description">'.$donnees['Description'].'</div>

                </div>

                <div class="contenuPost">

                </div>

            </div>';
                
            }
            ?>


    </div>



    <?php

        include 'footer.html';

        ?>

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>

</html>
