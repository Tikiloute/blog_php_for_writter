
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

        echo "Vous êtes connecté";
        echo $createArticle;
    ?>
        <a class="nav-link" href="index.php?action=logout">Vous déconnecter</a>

    <?php

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
        
            echo "Vous êtes connecté";
            echo $createArticle;
        ?>
            <a class="nav-link" href="index.php?action=logout">Vous déconnecter</a>
        
        <?php
        
        }
    
} 



