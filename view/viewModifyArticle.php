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
    <div id="myInput"></div>
    <a href='index.php?action=reading&read=<?= $_GET['modify'] ?>&comment=1' class="btn btn-light text-primary ms-4">Revenir à l'article</a>
    <form action="index.php?action=edit&modify=<?= $_GET['modify']?>&valid=true" method="POST" class="card" style="width: 20rem;">
        <input type="hidden" name="action" value="editArticle">
        <input type="hidden" name="idArticle" value="<?= $_GET['modify'] ?>">
        <textarea placeholder="titre" name="titreArticle"><?= $articles[$aimArticle]['titre'] ?></textarea>
        <textarea id="ModifyTextArea"  placeholder="contenu" style="height: 50vh" name="contenuArticle"><?= $containTxtArea?></textarea>
        <input type="submit" class="btn btn-primary"/>
    </form>
    <a href="index.php?action=deleteArticle&modify=<?= $_GET['modify']?>" id="deleteArticle" class="btn btn-danger" data-mdb-toggle="modal" data-mdb-target="#myModal">Supprimez l'article</a>
    
<?php 
$contenu = ob_get_clean();
require('template.php');
?>