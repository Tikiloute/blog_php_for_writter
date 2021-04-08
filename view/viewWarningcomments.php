<?php 
        for($i = 0; $i < $warning_arr_length ; $i++){       
?>    
                <div class="card mt-12">
                    <div class="card-body mt-4">
                        <h5 class="card-title"><?php echo $warnings[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "A dit : ".$warnings[$i]['commentaire'] ?></p>
                        <p class="card-text"><?php echo "Le : ".$warnings[$i]['date']?></p>
                        <p class="card-text"><?php echo "A propos de l'article : "?><a href="index.php?action=reading&read=<?php echo $warnings[$i]['idArticle']?>&comment=1" class="btn btn-primary"><?php echo $warnings[$i]['NomArticle']?></a></p>
                        <!-- <p class="card-text">mettre l'article concerné par le signalement</p> -->
                        <a href="index.php?action=delete&amp;idCom=<?php echo $warnings[$i]['idCommentaire']?>" class="btn btn-danger" >Supprimez ce commentaire</a>
                        <a href="index.php?action=accept&amp;idCom=<?php echo $warnings[$i]['idCommentaire']?>" class="btn btn-success">Commentaire valide</a>
                    </div>
                </div>
<?php 
print_r($warnings);
       } 

?>
