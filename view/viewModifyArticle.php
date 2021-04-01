<?php 

ob_start();
$aimArticle = $_GET['modify'] -1;

?>      

        <script>
            tinymce.init({
                selector: '#ModifyTextArea'
            });
        </script>
        <a href='index.php?action=reading&read=<?= $_GET['modify'] ?>&comment=1' class="btn btn-light text-primary ms-4">Revenir à l'article</a>
        <form action="#" method="POST" class="card" style="width: 20rem;">
            <input type="hidden" name="action" value="editArticle">
            <input type="hidden" name="idArticle" value="<?= $_GET['modify'] ?>">
            <textarea placeholder="titre" name="titreArticle"><?= $articles[$aimArticle]['titre'] ?></textarea>
            <textarea id="ModifyTextArea" placeholder="contenu" name="contenuArticle"><?= $articles[$aimArticle]['contenu'] ?></textarea>
            <input type="submit"/>
        </form>
<?php 


$viewModifyArticle = ob_get_clean();
$contenu = $viewModifyArticle;
require('template.php');