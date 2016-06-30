<?php
include (dirname(__FILE__) . '/../models/Passerelle.php');
$laPasserelle = new Passerelle();



$action = $_REQUEST['action'];
switch ($action) {


    case 'detail?projet': {
        $laPasserelle = new Passerelle();
            $id_projet = $_REQUEST['idprojet'];
   
            $projet =$laPasserelle->get_projet_complet($id_projet);
            $user_projet = $laPasserelle->get_informatoins_user($id_projet);
            
            include (dirname(__FILE__).'/../views/information_projet.php');
            break;
        }


    default : {
            include (dirname(__FILE__).'/../views/information_projet.php');
            break;
        }
}

