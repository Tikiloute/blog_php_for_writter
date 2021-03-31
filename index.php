<?php 
require('controller.php');

if(isset($_GET["action"])){

    switch($_GET["action"]){
        case 'admin':
            administrator($administrator, $comment);
            writeArticle($art);
            break;

        case 'articles':
            session_start();
            articlesList($art);
            break;

        case 'logout':
            logout();
            break;

        case 'accept':
            validateCommentButton($comment);
            break;

        case 'delete':
            deleteCommentbutton($comment);
            break;

        case 'accept':
            validateCommentButton($comment);
            break;

        case 'reading':
            session_start();
            article($art);
            writeComment($comment);
            commentsList($art, $comment);
            break;

        case 'warning':
            WarningComments($comment, $art);
            break;

        case 'edit':
            session_start();
            ModifyarticleView($art);
            break;

        case 'editArticle':
            session_start();
            Modifyarticle($art);
            break;

        default : home($art);
    }

} else {
    session_start();
    home($art);
}





