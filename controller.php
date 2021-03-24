<?php
require_once('model/Article_Manager.php');
require_once('model/Administrator_Manager.php');
require_once('model/Comment_Manager.php');



function writeArticle($newArticle)
{
    if (isset($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){
        $newArticle->new_article($_POST['titre'], $_POST['contenu']);
        echo "votre article a bien été envoyé";
    } else {
        "erreur l'article n'a pas été envoyé";
    }
}

function writeComment($newComment)
{
    if (isset($_POST['pseudo']) && isset($_POST['content']) && !empty($_POST['pseudo']) && !empty($_POST['content'])){
        $newComment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['read']);
        echo "votre commentaire a bien été envoyé !";
    } else {
        "erreur le commentaire n'a pas été envoyé !";
    };   
}

function commentsList($newComment)
{
    $comments = $newComment->read();
    $comment_arr_length = count($comments);
    require('view\viewCommentsList.php');
}

function WarningComments($newComment)
{
   $warnings = $newComment->readWarning();
   $warning_arr_length = count($warnings);
   //require('view\viewWarningcomments.php');
   if (isset($_GET['read']) && isset($_GET['id']) && isset($_GET['comment'])){
        $newComment->newCommentaryWarning($_GET['id'], $_GET['comment'],$_GET['read'],$_GET['date'] );
        echo "message signalé à la modération";
   }else{
        "erreur";
   // print_r($warnings);
   }    
}

function home($newArticle)
{
    $articles = $newArticle->read();
    $lastsArticles = array_reverse($articles);
    require('view/viewAccueil.php');
}

function administrator($owner,$newComment)
{
    $admin = $owner->admin();
    $warnings = $newComment->readWarning();
    $warning_arr_length = count($warnings);
    require('view/viewPageAdministrator.php');
}

function articlesList($newArticle)
{
    $articles = $newArticle->read();
    $arr_length =  count($articles);
    $lastsArticles = array_reverse($articles);
    require('view\viewArticlesList.php');
}

function logout()
{
    require('view\viewLogout.php');
}

function article($newArticle)
{
    $articles = $newArticle->read();
    $lastsArticles = array_reverse($articles);
    require('view\viewArticle.php');
}



    