<?php 

ob_start();
for ($i = 0; $i < 10; $i++){
?>
   
                <div class="card ">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $articlePaging[$i]['titre'] ?></h5>
                        <p class="card-text"><?php echo $articlePaging[$i]['contenu'] ?></p>
                        <a href="index.php?action=reading&amp;read=<?php echo $articles[$i]['id']?>" class="btn btn-primary d-grid col-3 mx-auto">En voir plus</a>
                    </div>
                </div>
<?php 
}
$contenu  = ob_get_clean();
require('template.php');