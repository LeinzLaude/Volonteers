

 <?php



if (!isset($_REQUEST['action'])) {
    $_REQUEST['action'] = 'defaut';
}

$action = $_REQUEST['action'];
switch ($action) {

        case 'defaut': {
   unset($_SESSION['id_user']);
    unset($_SESSION['nom_user']);
    unset($_SESSION['mdp_user']);
    unset($_SESSION['mail_user']);
    header('Location:index.php?page=index');
            
            
            break;
        }

    
    case 'logout': {
   unset($_SESSION['id_user']);
    unset($_SESSION['nom_user']);
    unset($_SESSION['mdp_user']);
    unset($_SESSION['mail_user']);
    header('Location:index.php?page=index');
            break;
        }


    default : {
                 
            break;
        }
}

?>