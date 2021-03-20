<?php
require_once('model/Article_Manager.php');
require_once('model/Administrator_Manager.php');
require_once('model/Comment_Manager.php');
require('view/viewCreateArticle.php'); 
require('view/viewLastsArticles.php');
require('view/viewHeader.php');




function writeArticle($newArticle){
    if (isset($_POST['titre']) && isset($_POST['contenu'])){
        $newArticle->new_article($_POST['titre'], $_POST['contenu']);
        echo "votre article a bien été envoyé";
    } else {
        "erreur l'article n'a pas été envoyé";
    }
    ;
}

function accueil($newArticle)
{
    $articles = $newArticle->read();
    $lastsArticles = array_reverse($articles);
    require('view/viewAccueil.php');
}

function administrator($owner)
{
    $admin = $owner->admin();
    require('view/viewPageAdministrator.php');
}
    