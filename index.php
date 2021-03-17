<?php 
require_once('model.php');

$art = new Article();
//ci dessous if car il ne reconnait pas "titre" et "contenu"
if (isset($_POST['titre']) && isset($_POST['contenu'])){
    $art->new_article($_POST['titre'], $_POST['contenu']);
};
$articles = $art->read();
$admin = $art->admin();
$lastsArticles = array_reverse($articles);

require_once("view.php");


