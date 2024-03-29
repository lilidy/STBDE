<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="style_accueil.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/styleSimon.css">

    <title>President</title>

    <?php
    
     $servername = 'localhost';
            $username = 'root';
            $password = '';
            
            //On établit la connexion
            $stbdeBD = new PDO("mysql:host=$servername;dbname=basebde", $username, $password);
    
    $utilisateur = $stbdeBD->query('SELECT * FROM utilisateur');
        ?>

</head>

<body>

    <!-- Titre -->
    <section class="container-fluid text">
        <div class="textePartenaire">
            <h1>President</h1>
        </div>
    </section>

    <!-- Boutton -->
    <div class="centreur">
        <select class="custom-select" style="">
            <option selected class="nomPrenom">-- | --</option>
            <?php    
                while($donnees = $utilisateur->fetch() ){
                                
                echo '<option value="'.$donnees['IdUser'].'">'.$donnees['Nom']." ".$donnees['Prenom'].'</option>';
            }
              
              ?>
        </select>

        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">Passer le Flambeau</button>
        </div>

        <div class="btn-group" role="group" aria-label="Basic example">
            <button type="button" class="btn btn-secondary">Ajouter au BDE</button>
        </div>


    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>


</body>

</html>
