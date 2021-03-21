
<?php 
    ob_start();
?>
        <h2 class="write-article">Bonjour <?= $admin['identifiant'] ?></h2>
        <h3 class="write-article">Créer votre article ici</h3>
        <form action="#" method="POST" class="card" style="width: 20rem;">
            <input type="text" placeholder="titre" name="titre" class="card-title"/>
            <textarea placeholder="contenu" name="contenu"></textarea>
            <input type="submit" />
        </form>

<?php
    $createArticle  = ob_get_clean();
?>


