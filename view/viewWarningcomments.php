<?php
ob_start();
$aimArticle = $_GET['action'];

?>    
    <div class="card ">
        <div class="card-body">
            <h5 class="card-title"><?php echo $comments[$aimArticle]['titre'] ?></h5>
            <p class="card-text"><?php echo $comments[$aimArticle]['contenu'] ?></p>
        </div>
    </div>
<?php 


$viewWarningComments = ob_get_clean();

