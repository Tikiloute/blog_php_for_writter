<?php
ob_start();
$aimArticle = $_GET['modify'] -1;
$containTxtArea = $articles[$aimArticle]['contenu'];
if(isset($_POST['titreArticle'], $_POST['contenuArticle'], $_POST['idArticle'], $_GET['valid'])){
    if((!empty($_POST['titreArticle'])) && (!empty($_POST['contenuArticle'])) && (!empty($_POST['idArticle'])) && $_POST['contenuArticle'] != $articles[$aimArticle]['contenu']){
        header("refresh:1;url=index.php?action=reading&read=".$_POST['idArticle']."&comment=1");
    }
}
?>      
    <script>
        tinymce.init({
            selector: '#ModifyTextArea'
        });
    </script>
    <a href='index.php?action=reading&read=<?= $_GET['modify'] ?>&comment=1' class="btn btn-light text-primary ms-4">Revenir à l'article</a>
    <form action="index.php?action=edit&modify=<?= $_GET['modify']?>&valid=true" method="POST" class="card" style="width: 20rem;">
        <input type="hidden" name="action" value="editArticle">
        <input type="hidden" name="idArticle" value="<?= $_GET['modify'] ?>">
        <textarea placeholder="titre" name="titreArticle"><?= $articles[$aimArticle]['titre'] ?></textarea>
        <textarea id="ModifyTextArea"  placeholder="contenu" style="height: 50vh" name="contenuArticle"><?= $containTxtArea?></textarea>
        <input type="submit" class="btn btn-primary"/>
    </form>

    <button type="button" class="btn btn-danger" id='myInput' data-bs-toggle="modal" data-bs-target="#myModal">Supprimer l'article</button>

    <div class="modal fade" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirmation de la suppression de l'article</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <p>Etes-vous sûr de vouloir supprimer cet article ?</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <a href="index.php?action=deleteArticle&modify=<?= $_GET['modify']?>" class="btn btn-danger">Supprimer l'article</a>
        </div>
        </div>
    </div>
    </div>
    
<?php 
$contenu = ob_get_clean();
require('template.php');
?>