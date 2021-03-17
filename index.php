<?php 
require_once('model.php');

$art = new Article();
$art->new_article($_POST['titre'], $_POST['contenu']);
$articles = $art->read();
$admin = $art->admin();
$lastsArticles = array_reverse($articles);
require_once("view.php");


