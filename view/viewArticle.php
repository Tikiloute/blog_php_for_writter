<?php 
ob_start();
$aimArticle = $_GET['action'] - 1;

?>    
    <div class="card ">
        <div class="card-body">
            <h5 class="card-title"><?php echo $lastsArticles[$aimArticle]['titre'] ?></h5>
            <p class="card-text"><?php echo $lastsArticles[$aimArticle]['contenu'] ?></p>
           <!-- <a href="index.php?action=article<?php// echo $lastsArticles[35]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">En voir plus</a> -->
        </div>
    </div>
<?php 


$viewArticle = ob_get_clean();
$contenu = $viewArticle;
require('template.php');

