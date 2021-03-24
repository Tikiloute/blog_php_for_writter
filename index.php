<?php 
require_once('controller.php');

$art = new Article_Manager();
$administrator = new Administrator_Manager();
$comment = new Comment_Manager();


if(isset($_GET["action"]) && $_GET["action"] ==='admin'){

    administrator($administrator, $comment);
    writeArticle($art);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='articles'){

    articlesList($art);

} elseif(isset($_GET["id"]) && isset($_GET["comment"])){
    WarningComments($comment);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='logout'){

    logout();

}  elseif(isset($_GET["read"])){

    article($art);
    writeComment($comment);
    commentsList($comment);

} elseif(isset($_GET['action']) && $_GET['action'] === "delete" && isset($_GET['idCom'])){

    deleteCommentbutton($comment);

} elseif(isset($_GET['action']) && $_GET['action'] === "accept" && isset($_GET['idCom'])){

    validateCommentButton($comment);

} else {

    home($art);

}








