<?php
$connecte = 0;
$estPresident =0;
$estAdmin = 0;
if(isset($_SESSION['email'])){
    $connecte = 1;
}
if(isset($_SESSION['email'])){
    
    $estPresident = $_SESSION['estpresident'];
    $estAdmin = $_SESSION['estadmin'];
}

?>

<?php

if($connecte == 1){
    
    echo'<div class="c">
    <ul class="overbar">';
    
    if($estPresident == 1){
    
    echo '<li>
        <a href="president.php"><img src="img/couronne.png" alt="" style="width: 50px"></a>
        <span>Président</span>
    </li>';
    
}
    
    if($estAdmin == 1){
        echo'<li>
        <a href="administration.php"><img src="img/admin.jpg" alt="" style="border-radius: 150px; width: 50px;"></a>
        <span>Administration</span>
    </li>';
    }
    
    if($connecte = 1){
        echo '<li>
        <a href="profil.php"><img src="img/Charles_br.PNG" alt="" style="border-radius: 150px; width: 50px;"></a>
        <span>Bienvenue Nom Prenom</span>
    </li>';
    }
    
    echo'</ul>

</div>';
    
}

if($connecte == 0){
    echo'<div id="inscon">
            <a href="connexion.php"><button type="submit" class="btn btn-secondary">Connexion</button></a>
            <a href="inscription.php"><button type="submit" class="btn btn-light">Inscription</button></a>

        </div>';
}

?>
