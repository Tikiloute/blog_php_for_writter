<?php 
ob_start();
$aimArticle = $_GET['modify'] - 1;

?>    
            <div class="form-floating">
                <textarea class="form-control"><?php echo $articles[$aimArticle]['titre'] ?></textarea>
                <textarea class="form-control"><?php echo $articles[$aimArticle]['contenu'] ?></textarea>
            </div>
            <a href="index.php?modify=<?php echo $articles[$aimArticle]['id']?>&amp;titre=<?php echo $articles[$aimArticle]['titre'] ?>&amp;contenu=<?php echo $articles[$aimArticle]['contenu']?> ">Modifiez cet article</a>
        </div>
    </div>
<?php 


$viewModifyArticle = ob_get_clean();
$contenu = $viewModifyArticle;
require('template.php');