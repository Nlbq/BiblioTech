<?php 
ob_start();
?>

<style>
<?php 
    include "public/css/livres/modifierLivre.css";
    include "public/css/template.css"; 
?>
</style>

<form method="POST" action="<?= URL ?>livres/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre" class="mt-2 mb-2 text-light titre-modif">Titre : </label>
        <input type="text" class="form-control mb-3 titre-input-modif" id="titre" name="titre" value="<?= $livre->getTitre() ?>">
    </div>
    <div class="form-group">
        <label for="nbPages" class="mt-2 mb-2 text-light titre-nombre-pages-modif">Nombre de pages : </label>
        <input type="number" class="form-control mb-3 nombre-pages-input-modif" id="nbPages" name="nbPages" value="<?= $livre->getNbPages() ?>">
    </div>
        <label class="mb-2 text-light titre-image-modif">Image : </label>
    <div class="row">
        <div class="text-center">
            <img src="<?= URL ?>public/imgLivres/<?= $livre->getImage() ?>"  class="align-items-center image-modif">
        </div>
    </div>
    <div class="form-group">
        <label for="image" class="mt-2 mb-2 text-light titre-changer-image-modif">Changer l'image : </label><br>
        <input type="file" class="form-control-file mb-3 col-12 text-center changer-image-input-modif" id="image" name="image">
    </div>
    <input type="hidden" name="identifiant" value="<?= $livre->getId(); ?>">
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-modif mt-2 mb-2">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Modification du livre : " . " " . "'" .$livre->getTitre() . "'";
require "views/template.view.php";
?>