<?php  

include (dirname(__FILE__) . '/../models/Passerelle.php');


if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'creationProjet';
}

$action = $_REQUEST['action'];
switch ($action) {


    case 'creation?projet': {
            $laPasserelle = new Passerelle();
            
            if($laPasserelle->creation_projet()==false)
            {
                echo'<div class="alert alert-danger">Erreur lors de la création du projet. Veuillez recommencer ulturierement</div>';         
            }
            else
            {
         
         echo'<div class="alert alert-success">
  <strong>Votre projet a été ajouté !!</strong></div>';
            
            }
include (dirname(__FILE__).'/../views/creation_projet.php');
            break;
        }


    default : {
            include (dirname(__FILE__).'/../views/creation_projet.php');
            break;
        }
}