<?php 
        for($i = 0; $i < $comment_arr_length ; $i++){
           if(isset($_GET["read"]) && $_GET["read"] === $comments[$i]['idArticle']){
?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $comments[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "a dit : ".$comments[$i]['commentaire'] ?></p>
                        <p class="card-text"><?php echo $comments[$i]['date']?></p>
                        <a href="index.php?read=<?php echo $_GET["read"]?>&amp;id=<?php echo $comments[$i]['identifiant'] ?>&amp;comment=<?php echo $comments[$i]['commentaire'] ?>&amp;date=<?php echo $comments[$i]['date']?> " >Signalez ce commentaire</a>
                    </div>
                </div>
<?php 
            }
       } 

