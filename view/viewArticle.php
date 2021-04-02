<?php 
ob_start();
$aimArticle = $_GET['read']-1;

?>    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $articles[$aimArticle]['titre'] ?></h5>
            <p class="card-text"><?php echo $articles[$aimArticle]['contenu'] ?></p>
           <?php if(isset($_SESSION["identify"],$_SESSION["identify"])){ ?>
            <a href="index.php?action=edit&amp;modify=<?php echo $articles[$aimArticle]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">Modifier l'article</a>
        <?php } ?>
        </div>
    </div>
<?php 

$viewArticle = ob_get_clean();// = contenu 
$contenu = $viewArticle;
require('template.php');
require_once('view\viewCommentary.php');

?>

