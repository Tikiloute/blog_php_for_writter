<?php 
require_once('model/Article_Manager.php');
require_once('model/Administrator_Manager.php');
require_once('model/Comment_Manager.php');

$art = new Article_Manager();
//ci dessous if car il ne reconnait pas "titre" et "contenu" si ces derniers sont vide
if (isset($_POST['titre']) && isset($_POST['contenu'])){
    $art->new_article($_POST['titre'], $_POST['contenu']);
};
$administrator = new Administrator_Manager();
$comment = new Comment_Manager();

$articles = $art->read();
$admin = $administrator->admin();
$lastsArticles = array_reverse($articles);




require("template.php");



