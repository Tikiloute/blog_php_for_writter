<?php  
    ob_start();
        for($i = 0; $i < $count ; $i++){
            if(!empty($articlesReverse[$i]['titre'])){
    ?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $articlesReverse[$i]['titre'] ?></h5>
                        <p class="card-text"><?php echo $articlesReverse[$i]['contenu'] ?></p>
                        <a href="index.php?action=reading&amp;read=<?php echo $articles[$i]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">En voir plus</a>
                    </div>
                </div>
    <?php 
            }
        } 
    $List  = ob_get_clean();
    $contenu = $List;
    require_once('template.php');
    require_once('view\viewPagingButton.php');
    
    ?>