<?php 
    ob_start();
    //mise en place des 3 derniers articles écrits-----------------------------------------         
        for($i = 0; $i < $lastsArticlesNumber; $i++){
            if(!empty($articles[$i]['titre'])){
    ?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $articlesReverse[$i]['titre'] ?></h5>
                        <p class="card-text"><?php echo $articlesReverse[$i]['contenu'] ?></p>
                        <a href="index.php?action=reading&amp;read=<?php echo $articlesReverse[$i]['id']?>&amp;comment=1" class="btn btn-primary d-grid col-3 mx-auto">En voir plus</a>
                    </div>
                </div>
    <?php 
            }
        } 
    $LastsArticle  = ob_get_clean();
    
    ?>