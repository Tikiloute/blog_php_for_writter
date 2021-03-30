
<?php
$page =  $_GET['page'];
if(isset($_GET['page']) && $round >1){

?>
<nav aria-label="Page navigation example">
  <ul class="pagination justify-content-center">
    <li class="page-item"><a class="page-link" href="index.php?action=articles&amp;page=<?php echo $page-1 ?>">précédent</a></li>
    <?php 
    for ($i = 1; $i <= $round ; $i++){
    ?>
    <li class="page-item"><a class="page-link" href="index.php?action=articles&amp;page=<?php echo $i ?>"><?php echo $i ?></a></li>
    <?php
    }
    ?>
    <li class="page-item"><a class="page-link" href="index.php?action=articles&amp;page=<?php echo $page+1?>">suivant</a></li>
  </ul>
</nav>

<?php
}
?>