<?php 
        for($i = 0; $i < $comment_arr_length ; $i++){
           if(isset($_GET["read"]) && $_GET["read"] === $comments[$i]['idArticle']){
?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $comments[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "a dit : ".$comments[$i]['commentaire'] ?></p>
                    </div>
                </div>
<?php 
            }
       } 