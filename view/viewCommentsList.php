<?php 
        $aim = $_GET['read'];
        for($i = 0; $i < $comment_arr_length ; $i++){
           if(isset($_GET["read"]) && $_GET["read"] === $comments[$i]['idArticle']){
?>    
                <div class="card justify-content-center">
                    <div class="card-body justify-content-center">
                        <h5 class="card-title"><?php echo $comments[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "A dit : ".$comments[$i]['commentaire'] ?></p>
                        <p class="card-text"><?php echo "Le : ".$comments[$i]['date']?></p>
                        <a href="index.php?action=warning&amp;read=<?php echo $comments[$i]['idArticle']?>&amp;id=<?php echo $comments[$i]['identifiant'] ?>&amp;idCommentaire=<?php echo $comments[$i]['id'] ?>&amp;comment=<?php echo $comments[$i]['commentaire'] ?>&amp;date=<?php echo $comments[$i]['date']?> " >Signalez ce commentaire</a>
                    </div>
                </div>
<?php 
            }
       } 

