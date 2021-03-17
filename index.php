<?php 
require_once('model.php');

$art = new Article();
$art->new_article($_POST['titre'], $_POST['contenu']);
$articles = $art->read();
$lastsArticles = array_reverse($articles);
print_r($lastsArticles);
require_once("view.php");


