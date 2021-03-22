<?php 
    ob_start();
    //mise en place des 3 derniers articles écrits-----------------------------------------         
        for($i = 1; $i <= 3; $i++){
            if(!empty($lastsArticles[$i]['titre'])){
    ?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $lastsArticles[$i]['titre'] ?></h5>
                        <p class="card-text"><?php echo $lastsArticles[$i]['contenu'] ?></p>
                        <a href="index.php?action=<?php echo $articles[$i]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">En voir plus</a>
                    </div>
                </div>
    <?php 
            }
        } 
    $LastsArticle  = ob_get_clean();
    
    ?>