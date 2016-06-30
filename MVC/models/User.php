<?php

class User {

    private $_id_user;
    private $_nom_user;
    private $_prenom_user;
    private $_date_naissance_user;
    private $_pays_user;
    private $_ville_user;
    private $_profession_user;
    private $_mail_user;
    private $_mdp_user;

    
    //Constructeur
    
    function __construct($id_user, $nom_user, $prenom_user, $date_naissance_user, $pays_user, $ville_user, $profession_user, $mail_user, $mdp_user) {
        $this->_id_user = $id_user;
        $this->_nom_user = $nom_user;
        $this->_prenom_user = $prenom_user;
        $this->_date_naissance_user = $date_naissance_user;
        $this->_pays_user = $pays_user;
        $this->_ville_user = $ville_user;
        $this->_profession_user = $profession_user;
        $this->_mail_user = $mail_user;
        $this->_mdp_user = $mdp_user;
    }

    
    //Accesseurs
    function get_id_user() {
        return $this->_id_user;
    }

    function get_nom_user() {
        return $this->_nom_user;
    }

    function get_prenom_user() {
        return $this->_prenom_user;
    }

    function get_date_naissance_user() {
        return $this->_date_naissance_user;
    }

    function get_pays_user() {
        return $this->_pays_user;
    }

    function get_ville_user() {
        return $this->_ville_user;
    }

    function get_profession_user() {
        return $this->_profession_user;
    }

    function get_mail_user() {
        return $this->_mail_user;
    }

    function get_mdp_user() {
        return $this->_mdp_user;
    }

}
