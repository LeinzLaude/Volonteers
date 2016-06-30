<?php

function afficher_projet() {
    global $bdd;
    $projet = array();

    $requete = $bdd->query('SELECT* From projet');

    while ($data = $requete->fetch()) {
        $projet[] = $data;
    }

    return $projet;
}
