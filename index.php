<?php 
require_once('controller.php');

$art = new Article_Manager();
$administrator = new Administrator_Manager();
$comment = new Comment_Manager();


if(isset($_GET["action"]) && $_GET["action"] ==='admin'){

    administrator($administrator);
    writeArticle($art);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='articles'){

    ArticlesList($art);

} elseif(isset($_GET["action"]) && $_GET["action"] ==='logout'){

    require('view\viewLogout.php');
}else {

    home($art);

}








