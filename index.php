<?php 
require_once('controller.php');

$art = new Article_Manager();
$administrator = new Administrator_Manager();//AdmMana
$comment = new Comment_Manager();
$manager = new Manager();


if(isset($_GET["action"]) && $_GET["action"] ==='admin'){

    administrator($administrator, $comment);
    writeArticle($art);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='articles'){

    articlesList($art);

} elseif(isset($_GET["id"], $_GET["comment"])){
    WarningComments($comment);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='logout'){

    logout();

}  elseif(isset($_GET["read"])){//index.php?action=read&read=id

    article($art);
    writeComment($comment);
    commentsList($comment);

} elseif(isset($_GET['action']) && $_GET['action'] === "delete" && isset($_GET['idCom'])){

    deleteCommentbutton($comment);

} elseif(isset($_GET['action']) && $_GET['action'] === "accept" && isset($_GET['idCom'])){

    validateCommentButton($comment);

} elseif(isset($_GET['modify'])){
    
    ModifyarticleView($art);

    if(isset($_GET['titre']) && isset($_GET['contenu']) && isset($_GET['modify'])){

    Modifyarticle($art);
    }

}else {

    home($art);

}








