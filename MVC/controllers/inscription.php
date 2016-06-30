<?php

if (isset($_POST["valider"])) {
    include (dirname(__FILE__) . '/../models/Passerelle.php');
    $user = new Passerelle();
    if ($user->inscription_utilisateur() == true) {
        echo'<script>alert("Vous pouvez dès à présent vous connecter !") </script>';   
 header('Location:index.php?page=connexion');
    } else {
        echo"Erreur";
    };
}
include (dirname(__FILE__) . '/../views/inscription.php');



?>
