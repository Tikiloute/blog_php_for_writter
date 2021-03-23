<?php
?>    
    <div class="card ">
        <div class="card-body">
            <h5 class="card-title"><?php echo $comments[$_GET['warning']-1]['identifiant'] ?></h5>
            <p class="card-text"><?php echo $comments[$_GET['warning']-1]['commentaire'] ?></p>
            <p class="card-text"><?php echo $comments[$_GET['warning']-1]['date']?></p>
        </div>
    </div>
<?php 


