
<?php

include (dirname(__FILE__) . '/../models/Passerelle.php');
$laPasserelle = new Passerelle();



if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'defaut';
}

$action = $_REQUEST['action'];
switch ($action) {

        case 'defaut': {
            
            include (dirname(__FILE__).'/../views/profil_user.php');
            break;
        }

    
    case 'view?user': {
        $laPasserelle = new Passerelle();
            $id_user = $_REQUEST['iduser'];
   
            $user =$laPasserelle->get_informatoins_user_profil($id_user);
                        include (dirname(__FILE__).'/../views/profil_user.php');
            break;
        }


    default : {
                        include (dirname(__FILE__).'/../views/profil_user.php');
            break;
        }
}