<?php 
require_once('model.php');

$art = new Article();
$art->new_article('hello ', 'test test');
$articles = $art->read();
//print_r($articles);
print_r( $articles[0][1]);
require_once("view.php");


