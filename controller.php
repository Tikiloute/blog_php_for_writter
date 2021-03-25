<?php
require_once('model/manager.php');
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
   if (isset($_GET['read']) && isset($_GET['id']) && isset($_GET['comment'])){
        $newComment->newCommentaryWarning($_GET['id'], $_GET['comment'],$_GET['read'],$_GET['date'] );
        echo "message signalé à la modération";
        header( "refresh:2;url=index.php");
   }else{
        "erreur";
   }    
}

function deleteCommentbutton($newComment)
{
    $warnings = $newComment->readWarning();
    $warning_arr_length = count($warnings);
    if(isset($_GET['action']) && isset($_GET['idCom']) && $_GET['action'] === "delete"){
        $newComment->deleteComment($_GET['idCom']);
        $newComment->deleteCommentWarning($_GET['idCom']);
        echo "commentaire supprimé";
        header( "refresh:2;url=index.php?action=admin");
        } else {
            echo "erreur le commentaire n'est pas supprimé";
    }
}

function validateCommentButton($newComment){
    $warnings = $newComment->readWarning();
    $warning_arr_length = count($warnings);
    if(isset($_GET['action']) && isset($_GET['idCom']) && $_GET['action'] === "accept"){
        $newComment->deleteCommentWarning($_GET['idCom']);
        echo "commentaire validé";
        header( "refresh:2;url=index.php?action=admin");
        } else {
        echo "erreur le commentaire n'est pas validé";
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
   // $lastsArticles = array_reverse($articles);
    require('view\viewArticle.php');
}

function ModifyarticleView($newArticle)
{
   
    $articles = $newArticle->read();
    require('view\viewModifyArticle.php');

}

function Modifyarticle($newArticle)
{
   
    $articles = $newArticle->read();
    $newArticle->modify($_GET['titre'], $_GET['contenu'],$_GET['modify']);

}




    