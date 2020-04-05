<!DOCTYPE html >
<html lang="fr">
<head>
  <title>WEBDE Lyon</title>
  <link rel="stylesheet" href="css/profil_style.css">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

<body>


    <div class="infos">
        <div class="container-fluid" style="column-count: 2;">
            <div id="div2">
                <div id="bloc" style="column-count: 2; margin: 0;">
                    <span>Prenom</span>
                    <input type="text" id="entered"  placeholder="Simon" readonly>
                </div>    
                <div id="bloc" style="column-count: 2;">
                    <span>Classe</span>
                    <input type="text" id="entered"  placeholder="B2" readonly>
                </div>
                <div id="bloc" style="column-count: 2;">
                    <span>Nom</span>
                    <input type="text" id="entered"  placeholder="PIJARD" readonly>
                </div>
                
                <div id="bloc" style="column-count: 2;">
                    <span>Email</span>
                    <input type="email" id="entered"  placeholder="simon.pijard@epsi.fr" readonly>
                </div>
            </div>

        </div>
    </div>

    <div class="formulaire">
        <div class="container-fluid">
            <h4>Nouveau mot de passe</h4>

            
            <div id="bloc">
                <input type="password" id="entered" style="width: 250px;"  placeholder="Nouveau mot de passe">
            </div>
            <div id="bloc">
                <input type="password" id="entered" style="width: 250px;"  placeholder="Confirmer le mot de passe">
            </div>
        <br>
            <input type="submit" value="Valider" class="submit">
        </div>
    </div>
    <div style="align-items: center; text-align: center;">
        <a href="deconnection.php"><button type="button" class="btn btn-secondary">Déconnexion</button></a>
        <br>
        <a href="acceuil.html"> <small>Supprimer mon compte.</small></a>
    </div>
    
</body>
</html>