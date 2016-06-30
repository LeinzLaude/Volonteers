<?php
include (dirname(__FILE__).'/../models/news.php');
$news=afficher_news();
include (dirname(__FILE__).'/../views/news.php');

