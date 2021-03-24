<?php 
        for($i = 0; $i < $warning_arr_length ; $i++){
           
?>    
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $warnings[$i]['identifiant'] ?></h5>
                        <p class="card-text"><?php echo "a dit : ".$warnings[$i]['commentaire'] ?></p>
                        <p class="card-text"><?php echo $warnings[$i]['date']?></p>
                        <a href="index.php?action=delete&amp;idCom=<?php echo $warnings[$i]['idCommentaire']?>" >Supprimez ce commentaire</a>
                        <a href="index.php?action=accept&amp;idCom=<?php echo $warnings[$i]['idCommentaire']?>" >Commentaire valide</a>
                    </div>
                </div>
<?php 

       } 


