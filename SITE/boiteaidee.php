<!DOCTYPE html>
<html lang="en">

<head>
    <title>Boiteaidee</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <?php
    
    include 'lienIconeFooter.html';
    
    include 'stylesBarres.php';
    
    ?>
</head>

<body>


    <?php
    

        include 'navbar.html';
        
        ?>


    <div style="display: flex;align-items: center;justify-content: center;margin-bottom: 5vh; margin-top: 5vh; padding: 0;">
        <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true" style="background-color: rgb(202, 202, 202); margin-right: 1vh; ">Idée</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false" style="background-color: rgb(202, 202, 202)">Retour</a>
            </li>

        </ul>
    </div>

    <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">




            <div class=".container-fluid" style="background-color: rgb(190, 190, 190);  display: flex; ">

                <textarea placeholder="Votre idée ..." name="" id="" cols="30" rows="10" style="width: 80%;  padding: 10px; background-color: rgb(243, 243, 243); margin: 3%;"></textarea>

                <div>
                    <button type="button" class="btn btn-success" style="margin-top: 20vh;">Envoyer</button>
                </div>

            </div>
        </div>




        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
            <div class=".container-fluid" style="background-color: rgb(190, 190, 190);  display: flex; ">

                <textarea placeholder="Votre retour..." name="" id="" cols="30" rows="10" style="width: 80%;  padding: 10px; background-color: rgb(243, 243, 243); margin: 3%;"></textarea>

                <div>
                    <button type="button" class="btn btn-success" style="margin-top: 20vh;">Envoyer</button>
                </div>

            </div>
        </div>

    </div>

    <?php
    
        include 'footer.html';
        ?>

</body>

</html>
