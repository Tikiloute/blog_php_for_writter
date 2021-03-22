<?php 
        for($i = 0; $i < $comment_arr_length ; $i++){
           if($_GET["read"] === $comments[$i]['idArticle']){
    ?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $comments[$_GET["read"]-1]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "a dit : ".$comments[$_GET["read"]-1]['commentaire'] ?></p>
                    </div>
                </div>
    <?php 
            }
       } 