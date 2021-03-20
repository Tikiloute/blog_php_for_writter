<?php
require_once('model/Article_Manager.php');
require_once('model/Administrator_Manager.php');
require_once('model/Comment_Manager.php');
require('view/viewCreateArticle.php'); 
require('view/viewLastsArticles.php');
require('view/viewHeader.php');

$comment = new Comment_Manager();



function accueil(){
    $art = new Article_Manager();
    $articles = $art->read();
    $lastsArticles = array_reverse($articles);
    //ci dessous if car il ne reconnait pas "titre" et "contenu" si ces derniers sont vide
    if (isset($_POST['titre']) && isset($_POST['contenu'])){
        $art->new_article($_POST['titre'], $_POST['contenu']);
    };
    require('view/viewAccueil.php');
}

function administrator(){
    $administrator = new Administrator_Manager();
    $admin = $administrator->admin();
    require('view/viewPageAdministrator.php');
}