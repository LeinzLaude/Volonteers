<?php

class Passerelle {

    private $bdd;

    function __construct() {
        $this->bdd = new PDO('mysql:host=localhost;dbname=volonteers', 'root', '');
    }

    function connexionUser($mail_user, $mdp_user) {

        $mdp_user = md5($mdp_user);
        $resultatRequete = $this->bdd->query("SELECT * FROM user WHERE mail_user='$mail_user' AND mdp_user='$mdp_user'");
        $ligne = $resultatRequete->fetch();
        if ($ligne == false) {
            $user = NULL;
        } else {
            $id_user = $ligne["id_user"];
            $nom_user = $ligne["nom_user"];
            $prenom_user = $ligne["prenom_user"];
            $date_naissance_user = $ligne["date_naissance_user"];
            $pays_user = $ligne["pays_user"];
            $ville_user = $ligne["ville_user"];
            $profession_user = $ligne["profession_user"];
            $mail_user = $ligne["mail_user"];
            $mdp_user = $ligne["mdp_user"];
            $mdp_user = md5($mdp_user);

            $_SESSION['id_user'] = $ligne['id_user'];
            $_SESSION['nom_user'] = $ligne['nom_user'];
            $_SESSION['prenom_user'] = $ligne['prenom_user'];
            $_SESSION['mdp_user'] = $ligne['mdp_user'];
            $_SESSION['mail_user'] = $ligne['mail_user'];


            /* $user = new User($id_user, $nom_user, $prenom_user, $date_naissance_user, $pays_user, $ville_user, $profession_user, $mail_user, $mdp_user); */

            header('Location:index.php?page=accueil');
        }
    }

    function get_secteur_projet($id_secteur) {
        global $bdd;
        $secteur = array();
        $requete = $bdd->query("SELECT* From secteur where id_secteur='$id_secteur'");
        while ($data = $requete->fetch()) {
            $secteur[] = $data;
        }
        return $secteur;
    }

    function get_informatoins_user($id_projet) {
        global $bdd;
        $user = array();
        $requete = $bdd->query("SELECT* From user,projet where user.id_user=projet.id_user and id_projet='$id_projet'");
        while ($data = $requete->fetch()) {
            $user[] = $data;
        }
        return $user;
    }
    
    
        function get_informatoins_user_profil($id_user) {
        global $bdd;
        $user = array();
        $requete = $bdd->query("SELECT* From user where id_user='$id_user'");
        while ($data = $requete->fetch()) {
            $user[] = $data;
        }
        return $user;
    }
    

    function inscription_utilisateur() {
        global $bdd;
        $estInscrit = false;

        $nom_user = $_POST["nom_user"];
        $prenom_user = $_POST["prenom_user"];
        $mdp_user = $_POST["mdp_user"];
        $mdp1_user = $_POST["mdp1_user"];
        $date_naissance_user = $_POST["date_naissance_user"];
        $pays_user = $_POST["pays_user"];
        $ville_user = $_POST["ville_user"];
        $mail_user = $_POST["mail_user"];
        $profession_user = $_POST["profession_user"];

        /* $user = new User($nom_user, $prenom_user, $date_naissance_user, $pays_user, $ville_user); */

        if ($mdp_user != $mdp1_user) {
            echo('Les mots de passes ne sont pas identiques');
        } else {
            //Cryptage du mot de passe en MD5
            $mdp_user = md5($mdp_user);
            $sql = "INSERT INTO user VALUES('','$nom_user','$prenom_user','$date_naissance_user','$pays_user','$ville_user','$profession_user','$mail_user','$mdp_user')";
            if ($bdd->query($sql) == true) {
                $estInscrit = true;
            } else {
                echo "Error: " . $sql . "<br>" . $sql->error;
            }
            return $estInscrit;
        }
    }

    //

    function creation_projet() {
        global $bdd;
        $estAjoute = false;

        $id_user = $_SESSION['id_user'];
        $nom_projet = $_POST["nom_projet"];
        $id_secteur = $_POST["id_secteur"];
        $description_projet = $_POST["description_projet"];
        $date_debut_projet = $_POST["date_debut_projet"];
        $date_fin_projet = $_POST["date_fin_projet"];


        $sql = "INSERT INTO projet VALUES('','$description_projet','$nom_projet','$date_debut_projet','$date_fin_projet','$id_user','$id_secteur')";
        if ($bdd->query($sql) == true) {
            $estAjoute = true;
        } else {
            echo "Error: " . $sql . "<br>" . $sql->error;
        }
        return $estAjoute;
    }

    function afficher_projet_user($id_user) {
        global $bdd;
        $projet = array();

        $requete = $bdd->query("SELECT* From projet where id_user='$id_user'");

        while ($data = $requete->fetch()) {
            $projet[] = $data;
        }

        return $projet;
    }

    function liste_type_projet() {
        global $bdd;
        $type_projet = array();
        $requete = $bdd->query("SELECT* From secteur");
        while ($data = $requete->fetch()) {
            $type_projet[] = $data;
        }
        return $type_projet;
    }

    public function get_projet_complet($id_projet) {
        global $bdd;
        $info_projet = array();
        $requete = $bdd->query("SELECT * FROM projet WHERE id_projet = '$id_projet'");
        while ($data = $requete->fetch()) {
            $info_projet[] = $data;
        }
        return $info_projet;
    }

    public function delete_projet($id_projet) {
        global $bdd;
        $delete = false;
        $requete = $bdd->query("Delete from projet WHERE id_projet = '$id_projet'");
        $data = $requete->fetch();
    }

    public function get_all_user($id_user) {
        global $bdd;
        $user = array();
        $requete = $bdd->query("SELECT * FROM user WHERE id_user != '$id_user'");
        while ($data = $requete->fetch()) {
            $user[] = $data;
        }
        return $user;
    }

}
