<?php 
ob_start();
$aimArticle = $_GET['modify'] -1;

?>   
        <script>
            tinymce.init({
                selector: '#ModifyTextArea'
            });
        </script>
        <form action="#" method="GET" class="card" style="width: 20rem;">
            <input type="hidden" name="action" value="editArticle">
            <input type="hidden" name="idArticle" value="<?= $articles[$aimArticle]['id'] ?>">
            <textarea placeholder="titre" name="titreArticle"><?= $articles[$aimArticle]['titre'] ?></textarea>
            <textarea id="ModifyTextArea" placeholder="contenu" name="contenuArticle"><?= $articles[$aimArticle]['contenu'] ?></textarea>
            <input type="submit" ?>
        </form>

<?php 


$viewModifyArticle = ob_get_clean();
$contenu = $viewModifyArticle;
require('template.php');