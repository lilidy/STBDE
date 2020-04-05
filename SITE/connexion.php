
<?php
require 'bdd.php';
?>


<?php
session_start();



if(isset($_POST['connexion']))
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    if($email && $password){
        //$password = sha1($salt.$password);
        //hash_equals($hashed_password, crypt($user_input, $hashed_password))

        $PasswordHashed = password_hash($password, PASSWORD_BCRYPT);
        $requser = $bdd->prepare("SELECT * FROM utilisateur WHERE Mail = ?");
        $requser->execute(array($email));
        $userexist = $requser->rowCount();
        if($userexist == 1) {
            $userdata = $requser -> fetch();
            if ((password_verify($password, $userdata['Password']))){
                $_SESSION['prenom']=$userdata['Prenom'];
                $_SESSION['nom']=$userdata['Nom'];
                $_SESSION['email']=$email;
                $_SESSION['niveau']=$userdata['Niveau'];
                $_SESSION['estadmin']=$userdata['EstAdmin'];
                $_SESSION['estpresident']=$userdata['EstPresident'];
                header('Location:dashboard.php');
            }else{
                $erreur = "Le mot de passe n'est pas compatible";
            }
        } else {
            $erreur = "Email ou mot de passe incorect !";
        }

    }else $erreur =  "Veuillez saisir tous les champs!";
}
?>
<!Doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <title>Connexion</title>


    <?php

    include 'lienIconeFooter.html';

    include 'stylesBarres.php';

    include 'navbar.html'
    ?>
</head>

<body>
    <div class="container-fluid">

        <div class="formulaireConnexion">
            
            <div class="container-fluid">
                <div style="text-align: center; margin-bottom: 5vh;">
                    <h4>Connexion</h4>
                    <h7> <em>Connectez-vous pour accéder à la boite à idées.</em> </h7>
                    <br>
                    <small> <em> WEBDE EPSI/WIS LYON</em></small>
                    </div>
                <form method="post">

                    <?php
                    if (isset($erreur)) {
                        echo "<small></small><span style='color: red; margin-left: 50px'> $erreur</span></small><br><br>";
                    }
                    ?>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email EPSI/WIS (Obligatoire)" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe</label>
                        <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                    </div>
                    <section style="align-items: center; text-align: center;">
                        <div id="connectionbtn" style="column-count: 2;">
                            <button type="submit" name="connexion" class="btn btn-warning">Connexion</button>
                            <a href="inscription.php" style="margin-top: 150px;"> <small>S'inscrire</small></a>
                        </div>
                            

                    </section>
                </form>

            </div>
        </div>

        

    </div>

    
    
</body>

<?php

include 'footer.html';
?>
</html>
