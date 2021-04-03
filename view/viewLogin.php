<?php 
if(isset($_POST['id']) && isset($_POST['pswd'])){

    $username = $_POST['id'];
    $password = $_POST['pswd'];

    if (password_verify($password, $admin['password']) && $username === $admin['identifiant']){

        $_SESSION["identify"] = $username;
        $_SESSION["mdp"] = $password;

        ?>

    <style type="text/css">
        #connectingForm{
            display: none;
        }

    </style>

    <?php

        echo "<div class='alert alert-success text-center'>Vous êtes connecté</div>";
        header('location: index.php?action=admin');
        echo $createArticle;
        require('view\viewWarningcomments.php');

    } else {

        echo "Identifiant et / ou mot de passe incorrect";
    }

} elseif(isset($_SESSION["mdp"]) && isset($_SESSION["identify"])){

        if(password_verify($_SESSION["mdp"], $admin['password']) && $_SESSION["identify"] === $admin['identifiant']){
        ?>
        
            <style type="text/css">
                #connectingForm{
                    display: none;
                }
            </style>
        
        <?php
        
        echo "<div class='alert alert-success text-center'>Vous êtes connecté</div>";
            echo $createArticle;
            require('view\viewWarningcomments.php');
        
        } else {
            echo "<div class='alert alert-danger text-center'>Veuillez vous connecter</div>";
        }
    
} 



