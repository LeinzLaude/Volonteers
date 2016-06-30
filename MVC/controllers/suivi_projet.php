<?php
include (dirname(__FILE__) . '/../models/Passerelle.php');
$laPasserelle = new Passerelle();



if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'defaut';
}

$action = $_REQUEST['action'];
switch ($action) {

        case 'defaut': {
            
            include (dirname(__FILE__).'/../views/suivi_projet.php');
            break;
        }

    
    case 'supprimer?projet': {
        $laPasserelle = new Passerelle();
            $id_projet = $_REQUEST['idprojet'];
   
            $projet =$laPasserelle->delete_projet($id_projet);
                    
            $user_projet = $laPasserelle->get_informatoins_user($id_projet);
            
            include (dirname(__FILE__).'/../views/suivi_projet.php');
            break;
        }


    default : {
            include (dirname(__FILE__).'/../views/suivi_projet.php');
            break;
        }
}