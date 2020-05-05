
<?php
session_start();
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

<body style="background-image:url(img/licorne-dab.png)">

<?php

include 'overNavbar.php';

include 'navbar.php';

?>



<div class="container-fluid">

    <div class="formulaire">
        <div class="container-fluid">
            <div style="text-align: center; margin-bottom: 5vh;">
                <h5>Contactez-nous !</h5>
                <h7> <em>Envoyez-nous un message ou cliquez <a href="mailto: bde@lyon.epsi.fr">ici</a>.</em></h7>
                <br>
                <small> <em> WEBDE EPSI/WIS LYON</em></small>
            </div>
            <form action="envoidemailcontact.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom</label>
                    <input type="text" class="form-control" name="pnom"  id="prenom" oninput="controleMinCaractPrenom()" placeholder="Prénom" required>
                    <div id="display-error-prenom" style="color: red">
                        <small style="font-family: Open Sans,sans-serif;"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Nom</label>
                    <input type="text" class="form-control" name="nom" id="nom"  oninput="controleMinCaractNom()" placeholder="Nom" required>
                    <div id="display-error-nom" style="color: red">
                        <small style="font-family: Open Sans,sans-serif;"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="email" class="form-control" id="mail" name="email"  placeholder="Email" oninput="controle()" onclick="controle1()" required>
                    <div id="messagebadmail" style="color: red">
                        <small style="font-family: Open Sans,sans-serif;"></small>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleInputEmail1">Objet</label>
                    <input type="text" class="form-control" id="objet"  name="objContact" oninput="controleMinCaractObjet()"  placeholder="Objet du message" required>
                    <div id="display-error-objet" style="color: red">
                        <small style="font-family: Open Sans,sans-serif;"></small>
                    </div>
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Message</label>
                    <textarea type="text" id="enteredMess" name="message" style="height: 150px;width: 400px;margin-top: 10px;margin-bottom: 0px;border: 0px;" placeholder="Votre message" oninput="controleMessage()" required></textarea>
                    <div id="display-errorMess" style="color: red">
                        <small style="font-family: Open Sans,sans-serif;"></small>
                    </div>
                </div>


                <button type="submit" id="submit" class="btn btn-warning" onclick="controlecomplet()" name="envoi" style="margin: auto;margin-left: 20vh;">Envoyer</button>
                <br>
            </form>
        </div>
    </div>

</div>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2783.0489380537542!2d4.8043046154411755!3d45.77020947910582!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47f4ea8ef0c7b4c5%3A0x2f21d25e2194b244!2sEPSI%20Lyon!5e0!3m2!1sfr!2sfr!4v1582191880880!5m2!1sfr!2sfr" id="map" width=100% height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>


<script>
    var checkpnom = false;
    var  checknom = false;
    var  checkemail = false;
    var  checkobjet = false;
    var  checkmessage = false;
    function controle(){
        var mail_recup = document.getElementById("mail").value;
        if(mail_recup != '')
        {
            checkemail = false;
            var tab1 = mail_recup.split("@");
            var tab2 = tab1[1].split(".");
            if(tab2[0].length <= 2 || tab2[1].length < 2 )
            {
                document.getElementById("messagebadmail").innerHTML = "Adresse email incomplet";
                //revoir les required
                document.getElementById("mail").focus = false;
                checkemail = false;
            }else if(tab2[0].length >= 3 || tab2[1].length >= 2)
            {
                document.getElementById("messagebadmail").innerHTML = "";
                document.getElementById("mail").focus = true;
                checkemail = true;
            }
        }else{
            document.getElementById("messagebadmail").innerHTML = "*Champ obligatoire";
            document.getElementById("mail").required = true;
            checkemail = false;
        }
    }

    function controle1()
    {
        document.getElementById("messagebadmail").innerHTML = "Assurez vous de saisir la bonne adresse mail";
    }

    function controleMessage()
    {
        var mess_recup = document.getElementById("enteredMess").value;

        if (mess_recup == '') {
            document.getElementById("display-errorMess").innerHTML = "Ce champ doit être rempli !";
            checkmessage = false;
        }

        else if(mess_recup != '')
        {
            var tab = mess_recup.split(" ");
            if (tab.length < 4) {
                document.getElementById("display-errorMess").innerHTML = "*Au moins trois (3) mots :)";
                checkmessage = false;
            }else if(tab.length > 4)
            {
                document.getElementById("display-errorMess").innerHTML = "";
                checkmessage = true;
            }
        }
    }


    function controleMinCaractPrenom()
    {
        var mess_recup_prenom = document.getElementById("prenom").value;

        if (mess_recup_prenom == '') {
            document.getElementById("display-error-prenom").innerHTML = "Ce champ doit être rempli !";
            checkpnom = false;
        }

        else if(mess_recup_prenom != '')
        {

            if (mess_recup_prenom.length <= 3   ) {
                document.getElementById("display-error-prenom").innerHTML = "*Au moins trois (3) caracteres :)";
                checkpnom = false;
            }else if(mess_recup_prenom.length > 3)
            {
                document.getElementById("display-error-prenom").innerHTML = "";
                checkpnom = true;
            }
        }
    }

    function controleMinCaractNom() {
        var mess_recup_nom = document.getElementById("nom").value;

        if (mess_recup_nom == '') {
            document.getElementById("display-error-nom").innerHTML = "Ce champ doit être rempli !";
            checknom = false;
        }

        else if(mess_recup_nom != '')
        {

            if (mess_recup_nom.length <= 3) {
                document.getElementById("display-error-nom").innerHTML = "*Au moins trois (3) caracteres :)";
                checknom = false;
            }else if(mess_recup_nom.length > 3)
            {
                document.getElementById("display-error-nom").innerHTML = "";
                checknom = true;
            }
        }
    }

    function controleMinCaractObjet() {
        var mess_recup = document.getElementById("objet").value;

        if (mess_recup == '') {
            document.getElementById("display-error-objet").innerHTML = "Ce champ doit être rempli !";
            checkobjet = false;
        }

        else if(mess_recup != '')
        {

            if (mess_recup.length <= 3) {
                document.getElementById("display-error-objet").innerHTML = "*Au moins trois (3) caracteres :)";
                checkobjet = false;
            }else if(mess_recup.length > 3)
            {
                document.getElementById("display-error-objet").innerHTML = "";
                checkobjet = true;
            }
        }
    }

    function controlecomplet() {
        console.log(checkmessage);
        if(checkpnom != true || checknom != true || checkemail != true || checkobjet != true || checkmessage != true )
        {
            document.getElementById("submit").disabled = true;
            console.log(checkmessage);
            setTimeout(() => {  location.reload(); }, 1000);
            window.alert("Veuillez remplir correctement le formulaire à nouveau !");
        }else if(checkpnom == true || checknom == true || checkemail == true || checkobjet == true || checkmessage == true)
        {
            document.getElementById("submit").disabled = false;
            console.log(checkmessage);
        }
    }



</script>

<?php

include 'footer.html';
?>

</body>

</html>



























