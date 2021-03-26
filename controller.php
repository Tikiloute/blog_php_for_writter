<?php
require_once('model/Manager.php');
require_once('model/Article_Manager.php');
require_once('model/Administrator_Manager.php');
require_once('model/Comment_Manager.php');

$art = new Article_Manager();
$administrator = new Administrator_Manager();
$comment = new Comment_Manager();



/**
 * Concerne les articles 
 */
function writeArticle($art)
{
    if (isset($_POST['titre']) && isset($_POST['contenu']) && !empty($_POST['titre']) && !empty($_POST['contenu'])){
        $art->new_article($_POST['titre'], $_POST['contenu']);
        echo "votre article a bien été envoyé";
    } else {
        "erreur l'article n'a pas été envoyé";
    }
}

function home($art)
{
    $articles = $art->read();
    $lastsArticles = array_reverse($articles);
    require('view/viewAccueil.php');
}

function articlesList($art)
{
    $articles = $art->read();
    $arr_length =  count($articles);
    $lastsArticles = array_reverse($articles);
    require('view\viewArticlesList.php');
}

function article($art)
{
    $articles = $art->read();
    $lastsArticles = array_reverse($articles);
    require('view\viewArticle.php');
}

function ModifyarticleView($art)
{
   
    $articles = $art->read();
    require('view\viewModifyArticle.php');

}

function Modifyarticle($art)
{
    $articles = $art->read();
    $art->modify($_GET['titreArticle'], $_GET['contenuArticle'], $_GET['idArticle']);
    if(isset($_GET['titreArticle'], $_GET['contenuArticle'], $_GET['idArticle'])){
        echo "article modifié !";
            header( "refresh:1;url=index.php?action=reading&read=".$_GET['idArticle']);
    } else {
        echo "article non modifié, réessayez !";
    }
}

/**
 * Concerne les commentaires
 */

function writeComment($comment)
{
    if (isset($_POST['pseudo']) && isset($_POST['content']) && !empty($_POST['pseudo']) && !empty($_POST['content'])){
        $comment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['read']);
        echo "votre commentaire a bien été envoyé !";
    } else {
        "erreur le commentaire n'a pas été envoyé !";
    };   
}

function commentsList($comment)
{
    $comments = $comment->read();
    $comment_arr_length = count($comments);
    require('view\viewCommentsList.php');
}

function WarningComments($comment)
{
   $warnings = $comment->readWarning();
   $warning_arr_length = count($warnings);
   if (isset($_GET['read']) && isset($_GET['id']) && isset($_GET['comment'])){
        $comment->newCommentaryWarning($_GET['id'], $_GET['comment'],$_GET['idCommentaire'],$_GET['date'] );
        echo "message signalé à la modération";
        header( "refresh:2;url=index.php?action=reading&read=".$_GET['read']);
   }else{
        "erreur";
   }    
}

function deleteCommentbutton($comment)
{
    $warnings = $comment->readWarning();
    $warning_arr_length = count($warnings);
    if(isset($_GET['action']) && isset($_GET['idCom']) && $_GET['action'] === "delete"){
        $comment->deleteComment($_GET['idCom']);
        $comment->deleteCommentWarning($_GET['idCom']);
        echo "commentaire supprimé";
        header( "refresh:1;url=index.php?action=admin");
        } else {
            echo "erreur le commentaire n'est pas supprimé";
    }
}

function validateCommentButton($comment){
    $warnings = $comment->readWarning();
    $warning_arr_length = count($warnings);
    if(isset($_GET['action']) && isset($_GET['idCom']) && $_GET['action'] === "accept"){
        $comment->deleteCommentWarning($_GET['idCom']);
        echo "commentaire validé";
        header( "refresh:1;url=index.php?action=admin");
        } else {
        echo "erreur le commentaire n'est pas validé";
    }
}

/**
 * Concerne l'administration
 */

function administrator($administrator, $comment)
{
    $admin = $administrator->admin();
    $warnings = $comment->readWarning();
    $warning_arr_length = count($warnings);
    require('view/viewPageAdministrator.php');
}

function logout()
{
    require('view\viewLogout.php');
}





    