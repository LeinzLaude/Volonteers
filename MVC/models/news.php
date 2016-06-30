<?php
function afficher_news()
{
    global $bdd;
    $news=array();
    
    $requete=$bdd->query('SELECT* From news');
    
    while ($data=$requete->fetch())
    {
        $news[]=$data;
    }
    
    return $news;
    
}
