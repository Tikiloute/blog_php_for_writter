<?php 
require('controller.php');

if(isset($_GET["action"])){

    switch($_GET["action"]){
        case 'admin':
            administrator($administrator, $comment);
            writeArticle($art);
            break;

        case 'articles':
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
            article($art);
            writeComment($comment);
            commentsList($comment);
            break;

        case 'edit':
            ModifyarticleView($art);
            break;

        case 'editArticle':
            Modifyarticle($art);
            break;

        case 'undefined':
            home($art);
            break;

        default : home($art);
    }

} else {

    home($art);
}





