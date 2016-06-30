<?php
include (dirname(__FILE__) . '/../models/Passerelle.php');


if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'demandeConnexion';
}

$action = $_REQUEST['action'];
switch ($action) {


    case 'connexion?user': {
            $mail = $_REQUEST['mail_user'];
            $mdp = $_REQUEST['mdp_user'];
            $laPasserelle = new Passerelle();
            
            $user =$laPasserelle->connexionUser($mail, $mdp);
            if($user==NULL)
            {
                echo'<div class="alert alert-danger">Mauvais login / mot de passe. Merci de recommencer.</div>';
            }
            else
            {
         
                
            echo$user->get_id_user();
            
            }
            include (dirname(__FILE__) . '/../views/connexion.php');
            break;
        }


    default : {
            include (dirname(__FILE__) . '/../views/connexion.php');
            break;
        }
}







/*

  if (isset($_POST["connection"]))
  {
  include (dirname(__FILE__) . '/../models/user.php');
  $mail = $_POST['mail_user'];
  $mdp = $_POST['mdp_user'];
  $user = new User;
  $user->connexion_utilisateur($mail, $mdp);
  }
  include (dirname(__FILE__) . '/../views/connexion.php');
 * 
 */
?>
 


