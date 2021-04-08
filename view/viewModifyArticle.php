<?php
ob_start();
if(isset($_POST['titreArticle'], $_POST['contenuArticle'], $_POST['idArticle'], $_GET['valid'])){
    if((!empty($_POST['titreArticle'])) && (!empty($_POST['contenuArticle'])) && (!empty($_POST['idArticle'])) && $_POST['contenuArticle'] != $selectArticle[0]['contenu']){
        header("refresh:1;url=index.php?action=reading&read=".$_POST['idArticle']."&comment=1");
    }
}
?>      
        <!-- Mise en place de tinyMce (script) -->
    <script>
        tinymce.init({
            selector: '#ModifyTextArea'
        });
    </script>
    <a href='index.php?action=reading&read=<?= $_GET['modify'] ?>&comment=1' class="btn btn-light text-primary ms-4">Revenir à l'article</a>
    <form action="index.php?action=edit&modify=<?= $_GET['modify']?>&valid=true" method="POST" class="card" style="width: 20rem;">
        <input type="hidden" name="action" value="editArticle">
        <input type="hidden" name="idArticle" value="<?= $_GET['modify'] ?>">
        <textarea placeholder="titre" name="titreArticle"><?= $selectArticle[0]['titre'] ?></textarea>
        <textarea id="ModifyTextArea"  placeholder="contenu" style="height: 50vh" name="contenuArticle"><?= $selectArticle[0]['contenu']?></textarea>
        <input type="submit" class="btn btn-primary"/>
    </form>

                        <!-- bouton de la modal -->
    <button type="button" class="btn btn-danger" id='myInput' data-bs-toggle="modal" data-bs-target="#myModal">Supprimer l'article</button>

                         <!-- modal -->
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
            <!-- bouton suppression de l'article -->
            <a href="index.php?action=deleteArticle&modify=<?= $_GET['modify']?>" class="btn btn-danger">Supprimer l'article</a>
        </div>
        </div>
    </div>
    </div>
    
<?php 
$contenu = ob_get_clean();
require('template.php');
?>