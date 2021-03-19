<?php 
require('view/viewCreateArticle.php'); 
require('view/viewLastsArticles.php'); 
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
    <link type="text/css" rel="stylesheet" href="style.css" media="all">
    <title>Blog de monsieur Jean Forteroche</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Blog de Jean Forteroche</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Accueil</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Articles</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Nous contacter</a>
            </li>
        </ul>
            <form action="#" method="POST" id="login" >
                <input type="text" placeholder="identifiant" name="identifiant"/>
                <input type="text" placeholder="Mot de passe" name="password">   
                <input type="submit" value="Valider"/>
            </form>
        </ul>
        </div>
    </div>
    </nav>
</header>
    <h1>Blog de monsieur Jean Forteroche</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste accusantium, nihil obcaecati nemo vel libero voluptate numquam odit quidem, officiis pariatur! Qui facere architecto commodi, adipisci velit obcaecati delectus error vero ipsum assumenda dolorem deleniti esse recusandae corrupti temporibus. Sequi debitis, esse officia molestiae vitae ullam dignissimos laborum reiciendis a, recusandae voluptas eum vero quisquam error. Aliquam, vel nobis, tenetur velit, ab atque consectetur totam cum iure nihil recusandae! Cum sit fugiat, qui maiores nulla repellat ipsam eum accusamus blanditiis fuga velit temporibus quod quasi aliquam animi molestiae reprehenderit dolores rerum alias iusto dolorum expedita eaque! Quod earum ipsa ducimus quisquam ex molestias sunt, vel magnam at, beatae, minus tempora asperiores laudantium? Ducimus nihil rerum harum, sit unde assumenda molestiae perspiciatis! Non fugiat eum dolor possimus? Aut nemo quam, exercitationem harum repudiandae quis maxime alias amet eum dignissimos deserunt voluptates. Recusandae illo repudiandae consectetur placeat explicabo praesentium tenetur odio accusantium, voluptatum possimus neque magni sapiente, cum ullam nihil rerum? Optio odio suscipit nulla magnam officiis temporibus possimus, natus saepe explicabo, dolore molestiae quo recusandae vel iste. Accusamus vero magni tempora numquam veritatis magnam quia 
        facilis cumque, maiores non libero. Dolorem, totam et! In nemo hic vitae, debitis eveniet nam tempora!
    </p>
    <?php
        echo $createArticle;
    ?>
    <?php 
        echo $LastsArticles;
    ?>
</body>
</html>

