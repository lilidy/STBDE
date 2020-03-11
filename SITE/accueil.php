<!DOCTYPE html>


<html>

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

    <title>NavBar</title>
</head>

<body>

    <div class="container-fluid" style="padding:0">

        <?php
    
        include 'overNavbarBde.html';
        
        include 'navbarUserConnecte.html';
        
        ?>

        <div id="bloctextaccueil">

            <p id="presWEBDE">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit,
                sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim
                id est laborum.</p>
            <div>
                <img src="img\epsi.png" alt="EPSI" id="epsilogo">
                <img src="img\wis.png" alt="WIS" id="wislogo">
            </div>
        </div>

        <div style="display: block;
    text-align: center;
    margin-top: 10vh">
            <iframe width="900" height="500" src="https://www.youtube.com/embed/ulERa8BcNhk" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>


        <div class="filActu">
            <h6 style="text-align: center">Fil d'actualité</h6>

            <?php
                
            for($i=0;$i<10;$i++){
                
                
                echo '<div class="post">
                <div class="headerPost">
                    <div class="logos"></div>
                    <div class="texte"><b>WEBDE</b></div>
                    <div class="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Consequatur quaerat vel, cupiditate ipsam autem tempora repellendus tempore quis rerum id sequi, tenetur minus suscipit aut deserunt, alias odio molestiae. Iusto! Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tempore mollitia excepturi nulla expedita laborum cupiditate fugit aspernatur asperiores, qui fuga.</div>

                </div>

                <div class="contenuPost">

                </div>

            </div>';
                
            }
            
            ?>


        </div>
        
        
        
        <footer>
            <br />
            <div>
                <strong>WEBDE</strong>
            </div>
            <div id="partie_rzo">
                <ul class="list-inline dev-icons">
                    <li class="list-inline-item">
                        <a href="https://fr-fr.facebook.com/bdeepswisilyon"><i class="fab fa-facebook"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/bdeepsiwislyon/"><i class="fab fa-instagram"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/watch?v=ulERa8BcNhk&t=2s"><i class="fab fa-youtube"></i></a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.youtube.com/watch?v=ulERa8BcNhk&t=2s"><i class="fab fa-linkedin"></i></a>
                    </li>
                </ul>
            </div>
            <div id="auteurs">
                <a href="https://www.linkedin.com/in/idrissa-ndiaye-9a2455179/" class="idrissa" target="_blank"> Idrissa NDIAYE </a>
                &
                <a href="https://www.linkedin.com/in/jean-emmanuel-kouakou-668401173/" class="idrissa" target="_blank"> Emmanuel KOUAKOU </a>
                &
                <a href="https://www.linkedin.com/in/simon-pijard-ba6a40196/" class="idrissa" target="_blank"> Simon PIJARD</a>
            </div>
            <div id="Copyright">
                Copyright &copy; 2020 . Tous droits réservés.
            </div>
            <br />

        </footer>


    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
