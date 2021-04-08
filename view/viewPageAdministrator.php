<?php 
session_start();
require('viewCreateArticle.php');
ob_start();  
?>
    <div id="connectingForm">
        <form action="#" method="POST">
            <div class="col-12 mt-5">
                <div class="mb-3 col-3  mx-auto">
                    <label for="exampleInputId"  class="form-label">Identifiant</label>
                    <input type="text" name="id" class="form-control" id="exampleInputId">
                </div>
                <div class="mb-3 col-3 mx-auto">
                    <label for="exampleInputPassword1"  class="form-label">Mot de passe</label>
                    <input type="password" name ="pswd" class="form-control" id="exampleInputPassword1">
                </div>
                <div class="d-flex justify-content-center mt-4">
                <input type="submit" class="btn btn-primary"/>
                </div>
            </div>
        </form>
    </div>

<?php
    $contenu  = ob_get_clean();
    require_once('template.php');
    require_once('viewLogin.php');
?>