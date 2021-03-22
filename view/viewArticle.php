<?php 
ob_start();
$aimArticle = $_GET['read'] - 1;

?>    
    <div class="card ">
        <div class="card-body">
            <h5 class="card-title"><?php echo $lastsArticles[$aimArticle]['titre'] ?></h5>
            <p class="card-text"><?php echo $lastsArticles[$aimArticle]['contenu'] ?></p>
        </div>
    </div>
<?php 


$viewArticle = ob_get_clean();
$contenu = $viewArticle;
require('template.php');
require_once('view\viewCommentary.php');

