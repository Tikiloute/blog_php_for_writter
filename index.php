<?php 
require_once('controller.php');

if(isset($_GET["action"]) && $_GET["action"] ='admin'){
    administrator();
} else {
    accueil();
};




