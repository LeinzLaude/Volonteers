<?php

$bdd = new PDO('mysql:host=localhost;dbname=volonteers', 'root', '');
global $bdd;

class User {

    private $id_user;
    private $nom_user;
    private $prenom_user;
    private $date_naissance_user;
    private $pays_user;
    private $ville_user;
    private $profession_user;
    private $mail_user;
    private $mdp_user;

    function UserModel($id_user, $nom_user, $prenom_user, $date_naissance_user, $pays_user, $ville_user, $profession_user, $mail_user, $mdp_user) {
        $this->$id_user = $id_user;
        $this->$nom_user = $nom_user;
        $this->$prenom_user = $prenom_user;
        $this->$date_naissance_user = $date_naissance_user;
        $this->$pays_user = $pays_user;
        $this->$ville_user = $ville_user;
        $this->$profession_user = $profession_user;
        $this->mail_user = $mail_user;
        $this->$mdp_user = $mdp_user;
    }

    function get_id_user() {
        return $this->id_user;
    }

    function get_nom_user() {
        return $this->nom_user;
    }

    function get_prenom_user() {
        return $this->prenom_user;
    }

    function get_date_naissance_user() {
        return $this->date_naissance_user;
    }

    function get_pays_user() {
        return $this->pays_user;
    }

    function get_ville_user() {
        return $this->ville_user;
    }

    function get_profession_user() {
        return $this->profession_user;
    }

    function get_mail_user() {
        return $this->mail_user;
    }

    function get_mdp_user() {
        return $this->mdp_user;
    }

    function set_mail_user($mail_user) {
        $this->mail_user = $mail_user;
    }

    function connexion_utilisateur($mail_user, $mdp_user) {
        global $bdd;
        $i = false;
        $mdp_user = md5($mdp_user);
        $requete = $bdd->query("SELECT * FROM user WHERE mail_user='$mail_user' AND mdp_user='$mdp_user'");
        $nb = $requete->rowCount();
        if ($nb > 0) {
            $result = $requete->fetch();

            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['nom_user'] = $result['nom_user'];
            $_SESSION['mdp_user'] = $result['mdp_user'];
            $i = true;
        }
        if ($i == 1) {
            header('Location:index.php?page=accueil');
        } else {
            echo'<div class="alert alert-danger">Mauvais login / mot de passe. Merci de recommencer.</div>';
        }

        return $i;
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

}
