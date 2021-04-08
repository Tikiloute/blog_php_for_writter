<?php 
ob_start();

$aimArticle = $_GET['read']-1;

?>    
    <div class="card">
        <div class="card-body">
            <h5 class="card-title"><?php echo $selectArticle[0]['titre'] ?></h5>
            <p class="card-text"><?php echo $selectArticle[0]['contenu'] ?></p>
           <?php if(isset($_SESSION["identify"],$_SESSION["identify"])){ ?>
            <a href="index.php?action=edit&amp;modify=<?php echo $selectArticle[0]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">Modifier l'article</a>
        <?php } ?>
        </div>
    </div>
<?php 

$contenu = ob_get_clean();
require('template.php');
require_once('view\viewCommentary.php');

?>

