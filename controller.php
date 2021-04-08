<?php
require_once('model/Manager.php');
require_once('model/ArticleManager.php');
require_once('model/AdministratorManager.php');
require_once('model/CommentManager.php');

$art = new ArticleManager();
$administrator = new AdministratorManager();
$comment = new CommentManager();



/**
 * Concerne les articles 
 */

function Modifyarticle($art)
{
    $selectArticle = $art->selectArticle($_GET["modify"]);
    $idArt = $_GET['modify'];
    $articles = $art->read();
    $articlesReverse = $art->readReverse();
    require('view\viewModifyArticle.php');
    if(isset($_POST['titreArticle'], $_POST['contenuArticle'], $_POST['idArticle'], $_GET['valid'])){
        if((!empty($_POST['titreArticle'])) && (!empty($_POST['contenuArticle'])) && (!empty($_POST['idArticle'])) && $_POST['contenuArticle'] != $selectArticle[0]['contenu']){
            $art->modify($_POST['titreArticle'], $_POST['contenuArticle'], $_POST['idArticle']);
            echo "<div class='alert alert-success text-center'> Article modifié avec succès!</div>";
        } else {
            echo "<div class='alert alert-danger text-center'> Erreur, l'article n'a pas été modifié! </div>";
        }
    }

}

function writeArticle($art)
{
    if (!empty($_POST['titre']) && !empty($_POST['contenu'])){
        $art->new_article($_POST['titre'], $_POST['contenu']);
        echo "<div class='alert alert-success text-center'>Votre article a bien été envoyé</div>";
    }
}

function home($art)
{
    $lastsArticlesNumber=3;
    $articles = $art->read();
    $articlesReverse = $art->readReverse();
    require('view/viewAccueil.php');
}

function articlesList($art)
{    
    if(isset($_GET['page']) && $_GET['page'] < 1){
        $_GET['page']=1;
    };
    $limit= $art::LIMIT;
    $countArray = $art->countArticles();
    $count = $countArray[0];
    $round = $art->round($limit);
    $articles = $art->read();
    if(isset($_GET['page']) && $_GET['page'] > $round ){
        $_GET['page']=$round;
    };
    if(isset($_GET['page']) && $_GET['page']===1){
        $offset = ($_GET['page']-1);
    }else{
        $offset = ($_GET['page']-1)*$limit;
    };
    $articlePaging = $art->paging($limit, $offset);
    require('view\viewPaging.php');
}

function article($art)
{
    $selectArticle = $art->selectArticle($_GET["read"]);
    $articles = $art->read();
    require('view\viewArticle.php');
}

function deleteArticles($art)
{
    $articles = $art->read();
    $articlesReverse = $art->readReverse();
    if(isset($_GET['action']) && isset($_GET['modify'])){
    $art->deleteArticle($_GET['modify']);
    echo " Article supprimé avec succès!";
    header("refresh:1;url=index.php?action=articles&page=1");
    } else {
        echo "erreur";
    }
}

/**
 * Concerne les commentaires
 */

function writeComment($comment)
{
    if(isset($_POST['pseudo'], $_POST['content'])){
        if (!empty($_POST['pseudo']) && !empty($_POST['content'])){
            $comment->newCommentary($_POST['pseudo'], $_POST['content'], $_GET['read']);
            echo "<p class='alert alert-success text-center'>Votre commentaire a bien été envoyé !</p>";
        } else{
            echo "<p class='alert alert-danger text-center'>Erreur le commentaire n'a pas été envoyé !</p>";
        };
    }   
}

function commentsList($art, $comment)
{
    $selectComment = $comment->selectComment($_GET["read"]);
    $articles = $art->read();
    $limitC = $comment::LIMIT;//pour les const on utilise  :: plutot que ->
    $countC = [];
    if(isset($_GET['read'])){
        $countArrayC = $comment->countComment($_GET['read']);
        $countC = $countArrayC[0];
    };
    $roundC = $comment->round($limitC,$_GET['read']);
    if(isset($_GET['comment']) && $_GET['comment']===1){
        $offset = ($_GET['comment']-1);
    } elseif(isset($_GET['comment'])){
        $offset = ($_GET['comment']-1)*$limitC;
    }else {
        $offset = ($_GET['comment']-1)*$limitC;
    }
    $commentsPaging = $comment->paging($limitC, $offset, $_GET['read']);
    $rw = $comment->read();
    print_r($selectComment);
    require('view\viewPagingComments.php');
}

function WarningComments($comment, $art)
{
    //require_once('view\viewPagingComments.php');
    $selectArticle = $art->selectArticle($_GET["read"]);
    $articles = $art->read();
    $warnings = $comment->readWarning();
    $warning_arr_length = count($warnings);
    if (isset($_GET['read']) && isset($_GET['id']) && isset($_GET['commentaire'])){
        $comment->newCommentaryWarning($_GET['id'], $_GET['commentaire'],$_GET['idCommentaire'],$_GET['date'], $_GET['nomArticle'], $_GET['read']);
        echo "votre commentaire a bien été signalé !";
        header("refresh:1;url=index.php?action=reading&read=".$_GET['read']."&comment=1");
    }else{
        echo "erreur";
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
        exit();
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
        exit();
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

?>