<?php
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=bd_projet_orange;charset=utf8', 'root', '',
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
die('Erreur : '.$e->getMessage());
}
?>



<!DOCTYPE html >
<html lang="fr">
<head>
  <title>WEBDE Lyon</title>
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
</head>

<body>



    <div class="formulaireInscription">
        <div class="container-fluid">
            <div style="text-align: center; margin-bottom: 5vh;">
            <h4>Inscription</h4>
            <h7> <em>Créer votre compte avec votre adresse mail scolaire.</em> </h7>
            <small> <em> WEBDE EPSI/WIS LYON</em></small>
            </div>
            
            <form>
                <div class="form-group">
                    <label for="exampleInputPassword1">Prenom</label>
                    <input type="text" name="prenom" class="form-control" id="prenom" placeholder="Prenom" min="3" max="25" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" name="nom" class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Nom" min="3" max="25" required>
                </div>
    
                <div class="form-group" id="emaildiv">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" name="email" class="form-control" id="mail" aria-describedby="emailHelp" placeholder="Email EPSI/WIS (Obligatoire)" oninput="controle()"  required>
                    <div id="messagebadmail" style="color: red">
                        <p> </p>
                        </div>
                </div>
    
                    
                <div class="form-group" id="niveauEPSI" style="display: none;">
                    <label for="exampleFormControlSelect2" >Niveau</label>
                    <select name="niveau" multiple class="form-control"  required>
                        <option>B1</option>
                        <option>B2</option>
                        <option>B3</option>
                        <option>I1</option>
                        <option>I2</option>
                    </select>
                </div>
                <div class="form-group" id="niveauWIS" style="display: none;">
                    <label for="exampleFormControlSelect2" >Niveau</label>
                    <select name="niveau" multiple class="form-control" required>
                        <option>WIS1</option>
                        <option>WIS2</option>
                        <option>WIS3</option>
                        <option>WIS4</option>
                        <option>WIS5</option>
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
                    <a href="acceuil.html" style=" margin-top: 150px;"> <small>Compte éxistant? </small></a>
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



        // if((tab2[0] != 'epsi' || tab2[0] != 'wis') && tab2[1] != 'fr')
                // {
                //     document.getElementById("messagebadmail").innerHTML = "Mail EPSI/WIS obligatoire";
                // }
                // else if((tab2[0] == 'epsi' || tab2[0] == 'wis') && tab2[1] == 'fr')
                // {
                //     document.getElementById("messagebadmail").innerHTML = "";
                // }

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
</html>