<?php 
require_once('view/viewHeader.php');

echo $header;
?>

    <form>
        <div class="col-12 mt-5">
            <div class="mb-3 col-3  mx-auto">
                <label for="exampleInputId" class="form-label">Identifiant</label>
                <input type="text" class="form-control" id="exampleInputId">
            </div>
            <div class="mb-3 col-3 mx-auto">
                <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary col-3">Valider</button>
            </div>
        </div>
    </form>