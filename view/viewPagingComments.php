<?php 
        $aim = $_GET['read'];
        for($i = 0; $i < $countC ; $i++){
           if(isset($_GET["read"], $commentsPaging[$i]['idArticle']) && $_GET["read"] === $commentsPaging[$i]['idArticle']){
?>    
                <div class="card justify-content-center">
                    <div class="card-body justify-content-center">
                        <h5 class="card-title"><?php echo $commentsPaging[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "A dit : ".$commentsPaging[$i]['commentaire'] ?></p>
                        <p class="card-text"><?php echo "Le : ".$commentsPaging[$i]['date']?></p>
                        <a href="index.php?action=warning&amp;read=<?php echo $commentsPaging[$i]['idArticle']?>&amp;id=<?php echo $commentsPaging[$i]['identifiant'] ?>&amp;idCommentaire=<?php echo $commentsPaging[$i]['id'] ?>&amp;commentaire=<?php echo $commentsPaging[$i]['commentaire'] ?>&amp;date=<?php echo $commentsPaging[$i]['date']?>&amp;comment=<?php echo $_GET['comment']?>&amp;nomArticle=<?php echo $articles[$aim-1]['titre'] ?>" >Signalez ce commentaire</a>
                    </div>
                </div>
<?php 
            }
       } 

       require('view\ViewPagingCommentButton.php');