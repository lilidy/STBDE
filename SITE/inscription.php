




<?php

require 'bdd.php';

// On vérifie que le formulaire ai été envoyé :
if (isset($_POST['inscription'])) {
    // On vérifie qu'aucun champ ne soit vide ("doublecheck" du required) :
    if (!empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['email'])
        AND (!empty($_POST['niveauEPSI']) || !empty($_POST['niveauWIS']))
        AND !empty($_POST['mdp1']) AND !empty($_POST['mdp2'])
    ) {

        // On récupère les informations :
        $prenom = htmlspecialchars($_POST['prenom']);
        $nom = htmlspecialchars($_POST['nom']);
        $email = htmlspecialchars($_POST['email']);
        $niveauEPSI = htmlspecialchars($_POST['niveauEPSI']);
        $niveauWIS = htmlspecialchars($_POST['niveauWIS']);
        $mdp1 = $_POST['mdp1'];
        $mdp2 = $_POST['mdp2'];


        // On vérifie que les listes ne sont pas vides :
        if (($_POST['niveauEPSI'] != "null" OR $_POST['niveauWIS'] != "null") AND $_POST['email'] != "null") {

            // On vérifie que les champs ne dépasse pas la taille acceptée par la BDD :
            if (strlen($prenom) < 25) {
                if (strlen($nom) < 25) {
                    if (strlen($mdp1) < 50) {
                        if (strlen($email) < 50) {

                            // On vérifie que les deux mdp sont identiques :
                            if ($mdp1 == $mdp2) {
                                // On vérifie que l'email est bien valide :
                                if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

                                    // On vérifie que l'adresse mail n'est pas déjà enregistré dans la bdd :
                                    $req_mail = $bdd -> prepare("SELECT * FROM utilisateur WHERE Mail = ?");
                                    $req_mail -> execute(array($email));
                                    $mail_existe = $req_mail -> rowCount();
                                    if ($mail_existe == 0) {
                                        $PasswordHashed = password_hash($mdp1, PASSWORD_BCRYPT);
                                        // Tout est bon : on insert l'utilisateur dans la bdd :
                                        //$req_inser = $bdd -> prepare("INSERT INTO utilisateur(idUser,Prenom, Nom, Mail, Password, Niveau) VALUES(NULL , '?', '?', '?', '?', '?')");
                                        //$password = password_hash("$mdp1" , PASSWORD_BCRYPT);
                                        $req = $bdd->prepare('INSERT INTO utilisateur(idUser,Prenom, Nom, Mail, Password, Niveau) VALUES(:IdUser ,:prenom,:nom,:email,:password,:niveau)');

                                        $niveau = '';
                                        if (!empty($niveauEPSI))
                                        {
                                            $niveau = $niveauEPSI;
                                        }
                                        if(!empty($niveauWIS))
                                        {
                                            $niveau = $niveauWIS;
                                        }


                                        $req->execute(array(
                                            'IdUser' => null,
                                            'prenom'=> $prenom,
                                            'nom'=> $nom,
                                            'email'=> $email,
                                            'password'=> $PasswordHashed,
                                            'niveau'=> $niveau
                                        ));




                                        $success = 'Insription réussie !';

                                        sleep(2);
                                        //die('success');
                                        header('Location:connexion.php');




                                    } else {
                                        $erreur = "Cette adresse mail est déjà utilisée";
                                    }

                                } else {
                                    $erreur = "Votre adresse mail n'est pas valide";
                                }
                            } else {
                                $erreur = "Les mots de passe rentrés ne correspondent pas";
                            }
                        } else {
                            $erreur = "Votre email ne doit pas dépasser 50 caractères";
                        }
                    } else {
                        $erreur = "Votre mot de passe ne doit pas dépasser 25 caractères";
                    }
                } else {
                    $erreur = "Votre nom ne doit pas dépasser 25 caractères";
                }
            } else {
                $erreur = "Votre prénom ne doit pas dépasser 25 caractères";
            }
        }else {
            $erreur = "Selectionnez un niveau et remplissez votre email";
        }
    }

}

?>




<!DOCTYPE html >
<html lang="fr">
<head>
    <title>WEBDE Lyon</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">


    <?php

    include 'lienIconeFooter.html';

    include 'stylesBarres.php';

    include 'overNavbar.html';

    include 'navbar.html';

    ?>

</head>

<body>




<div class="formulaireInscription">
    <div class="container-fluid">







        <div style="text-align: center; margin-bottom: 5vh;">
            <h4>Inscription</h4>
            <h7> <em>Créer votre compte avec votre adresse mail scolaire.</em> </h7>
            <small> <em> WEBDE EPSI/WIS LYON</em></small>
        </div>

        <form method="POST" action="">

            <?php
            if (isset($erreur)) {
                echo "<br><small></small><span style='color: red; margin-left: 30px'> $erreur.</span></small>";
            }
            if (isset($success)) {
                echo "<br><small></small><span style='color: darkolivegreen; margin-left: 30px'> $success.</span></small>";
            }
            ?>

            <div class="form-group">
                <label for="exampleInputPassword1">Prenom</label>
                <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" min="3" max="25" value="<?php if(isset($prenom)){ echo $prenom; }?>" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nom</label>
                <input type="text" name="nom" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Nom" min="3" max="25" value="<?php if(isset($nom)){ echo $nom; }?>" required>
            </div>

            <div class="form-group" id="emaildiv">
                <label for="exampleInputEmail1">Email</label>
                <input type="email" name="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Email EPSI/WIS (Obligatoire)" oninput="controle()" value="<?php if(isset($email)){ echo $email; }?>" required>
                <div id="messagebadmail" style="color: red">
                    <p> </p>
                </div>
            </div>


            <div class="form-group" id="niveauEPSI" style="display: none;">
                <label for="exampleFormControlSelect2" >Niveau EPSI</label>
                <select name="niveauEPSI" id="inputState" class="form-control" required>
                    <option value="null" <?php if (isset($niveauEPSI) && $niveauEPSI == "null"){echo "selected";} ?>>--Sélectionnez votre niveau--
                    <option value="B1" <?php if (isset($niveauEPSI) && $niveauEPSI == "B1"){echo "selected";} ?>>B1
                    <option value="B2" <?php if (isset($niveauEPSI) && $niveauEPSI == "B2"){echo "selected";} ?>>B2
                    <option value="B3" <?php if (isset($niveauEPSI) && $niveauEPSI == "B3"){echo "selected";} ?>>B3
                    <option value="I1"  <?php if (isset($niveauEPSI) && $niveauEPSI == "I1"){echo "selected";} ?>>I1
                    <option value="I2" <?php if (isset($niveauEPSI) && $niveauEPSI == "I2"){echo "selected";} ?>>I2
                </select>
            </div>


            <div class="form-group" id="niveauWIS" style="display: none;">
                <label for="exampleFormControlSelect2" >Niveau WIS</label>
                <select name="niveauWIS" id="inputState" class="form-control" required>
                    <option value="null" <?php if (isset($niveauWIS) && $niveauWIS == "null"){echo "selected";} ?>>--Sélectionnez votre niveau--
                    <option value="WIS1" <?php if (isset($niveauWIS) && $niveauWIS == "WIS1"){echo "selected";} ?>>WIS1
                    <option value="WIS2" <?php if (isset($niveauWIS) && $niveauWIS == "WIS2"){echo "selected";} ?>>WIS2
                    <option value="WIS3" <?php if (isset($niveauWIS) && $niveauWIS == "WIS3"){echo "selected";} ?>>WIS3
                    <option value="WIS4" <?php if (isset($niveauWIS) && $niveauWIS == "WIS4"){echo "selected";} ?>>WIS4
                    <option value="WIS5" <?php if (isset($niveauWIS) && $niveauWIS == "WIS5"){echo "selected";} ?>>WIS5
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputPassword1">Mot de passe</label>
                <input type="password" name="mdp1" class="form-control" id="mdp1" required>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Confirmation mots de passe</label>
                <input type="password" name="mdp2" class="form-control" id="mdp2" aria-describedby="emailHelp" required>
            </div>


            <div id="connectionbtn" style="column-count: 2; text-align: center;">
                <button type="submit" name="inscription" class="btn btn-warning">S'inscrire</button>
                <a href="connexion.php" style=" margin-top: 150px;"> <small>Compte éxistant? </small></a>
            </div>





        </form>

    </div>
</div>



    <script>
        function controle()
        {
            var mail_recup = document.getElementById("mail").value;
            var niveau = document.getElementById("niveau");
            if(mail_recup != null)
            {
                var tab1 = mail_recup.split("@");
                var tab2 = tab1[1].split(".");

                if((tab2[0] != 'epsi' || tab2[0] != 'wis') && tab2[1] != 'fr' )
                {
                    document.getElementById("messagebadmail").innerHTML = "Mail EPSI/WIS obligatoire";
                    niveauEPSI.style.display = "none";
                    niveauWIS.style.display = "none";
                }
                else if((tab2[0] == 'epsi' || tab2[0] == 'wis') && tab2[1] == 'fr')
                {
                    document.getElementById("messagebadmail").innerHTML = "";
                    if(tab2[0] == 'epsi' )
                    {
                    niveauEPSI.style.display = "block";
                    niveauWIS.style.display = "none";
                    //revoir le height de formulaire    

                    }
                    else if(tab2[0] == 'wis')
                    {
                        niveauWIS.style.display = "block";
                        niveauEPSI.style.display = "none";
                    }  
                }
                else if(tab2[0].length > 4)
                {
                    document.getElementById("messagebadmail").innerHTML = "Mail EPSI/WIS obligatoire";
                    niveauEPSI.style.display = "none";
                    niveauWIS.style.display = "none";
                }

            }
            else if(mail_recup.length == 0)
            {
                document.getElementById("messagebadmail").innerHTML = "Champ mail obligatoire";
            }
        }




        // function controle(){

        //     var mailregex = new RegExp(/^\w+([\.-]?\w+)*@(epsi|wis){1}[.]fr$/); //regex mail avec nom de domaine epsi.fr
        //      var mail_recup = document.getElementById("mail").value;
        //     console.log(mail.mail_recup);
             
        //      if(mail_recup != mailregex){
        //          document.getElementById("messagebadmail").innerHTML = "Mail EPSI/WIS obligatoire";
        //      }else{
        //          continue;
        //      }
        // }


        
    </script>

</body>
<?php

include 'footer.html';
?>
</html>