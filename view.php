
<script> 
/**
 * ici permet de plus avoir d'article qui se lance dans la bdd au refresh de la page
*/   
    if(typeof window.history.pushState == 'function') {
        window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
</script>

<?php 
session_start();
require('template.php');

echo $head;

?>

<body>
    <h1>Blog de monsieur Jean Forteroche</h1>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste accusantium, nihil obcaecati nemo vel libero voluptate numquam odit quidem, officiis pariatur! Qui facere architecto commodi, adipisci velit obcaecati delectus error vero ipsum assumenda dolorem deleniti esse recusandae corrupti temporibus. Sequi debitis, esse officia molestiae vitae ullam dignissimos laborum reiciendis a, recusandae voluptas eum vero quisquam error. Aliquam, vel nobis, tenetur velit, ab atque consectetur totam cum iure nihil recusandae! Cum sit fugiat, qui maiores nulla repellat ipsam eum accusamus blanditiis fuga velit temporibus quod quasi aliquam animi molestiae reprehenderit dolores rerum alias iusto dolorum expedita eaque! Quod earum ipsa ducimus quisquam ex molestias sunt, vel magnam at, beatae, minus tempora asperiores laudantium? Ducimus nihil rerum harum, sit unde assumenda molestiae perspiciatis! Non fugiat eum dolor possimus? Aut nemo quam, exercitationem harum repudiandae quis maxime alias amet eum dignissimos deserunt voluptates. Recusandae illo repudiandae consectetur placeat explicabo praesentium tenetur odio accusantium, voluptatum possimus neque magni sapiente, cum ullam nihil rerum? Optio odio suscipit nulla magnam officiis temporibus possimus, natus saepe explicabo, dolore molestiae quo recusandae vel iste. Accusamus vero magni tempora numquam veritatis magnam quia 
        facilis cumque, maiores non libero. Dolorem, totam et! In nemo hic vitae, debitis eveniet nam tempora!
    </p>


    <?php 
    if(isset($_GET['identifiant']) && isset($_GET['password'])){
        $_SESSION['id'] = $_GET['identifiant'];
        $_SESSION['mdp'] = $_GET['password'];
    };
    if(!empty($_SESSION['id']) == $admin["identifiant"] && !empty($_SESSION['mdp']) == $admin["motDePasse"]){ ?>
        <h2>Créer votre article ici</h2>
        <form action="#" method="POST" class="card" style="width: 18rem;">
            <input type="text" placeholder="titre" name="titre" class="card-title"/>
            <textarea placeholder="contenu" name="contenu"></textarea>
            <input type="submit" />
        </form>
    <?php }?>
    <?php
        for($i = 0; $i <3; $i++){
            if(!empty($lastsArticles[$i]['titre'])){
    ?>    
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $lastsArticles[$i]['titre'] ?></h5>
                        <p class="card-text"><?php echo $lastsArticles[$i]['contenu'] ?></p>
                        <a href="#" class="btn btn-primary">En voir plus</a>
                    </div>
                </div>
        <?php }} ?>
</body>
</html>