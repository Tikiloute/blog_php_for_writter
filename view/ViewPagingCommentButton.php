<?php
    if(isset($_GET['comment']) && $roundC > 1){
?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="index.php?action=articles&amp;page=<?php echo $page-1 ?>">précédent</a></li>
    <?php 
    for ($i = 1; $i <= $roundC ; $i++){
    ?>
    <li class="page-item"><a class="page-link" href="index.php?action=reading&amp;read=<?php echo $_GET['read'] ?>&amp;comment=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
    <li class="page-item"><a class="page-link" href="index.php?action=articles&amp;page=<?php echo $page+1?>">suivant</a></li>
  </ul>
</nav>

<?php
    }
?>