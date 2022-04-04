<?php 
ob_start();
?>

<style>
<?php 
include "public/css/series/modifierSerie.css";
include "public/css/template.css";
?>
</style>

<form method="POST" action="<?= URL ?>series/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titreSerie" class="mt-1 mb-2 text-light titre-modif-serie">Titre : </label>
        <input type="text" class="form-control mb-2 titre-input-modif-serie" id="titreSerie" name="titreSerie" value="<?= $serie->getTitreSerie() ?>">
    </div>
    <div class="form-group">
        <label for="nbSaison" class="mt-1 mb-2 text-light titre-nombre-saison-ajout-serie">Nombre de saisons : </label>
        <input type="number" class="form-control mb-2 nombre-saison-input-ajout-serie" id="nbSaison" name="nbSaison" value="<?= $serie->getNbSaison() ?>">
    </div>
    <div class="form-group">
        <label for="anneeSortieSerie" class="mt-1 mb-2 text-light titre-annee-sortie-modif-serie">Année de sortie : </label>
        <input type="number" class="form-control mb-2 annee-sortie-input-modif-serie" id="anneeSortieSerie" name="anneeSortieSerie" value="<?= $serie->getAnneeSortieSerie() ?>">
    </div>
        <label class="mb-2 text-light titre-image-modif-serie">Image : </label>
    <div class="row">
        <div class="text-center">
            <img src="<?= URL ?>public/imgSeries/<?= $serie->getImageSerie() ?>"  class="align-items-center image-modif-serie">
        </div>
    </div>
    <div class="form-group">
        <label for="imageSerie" class="mt-1 mb-2 text-light titre-changer-image-modif-serie">Changer l'image : </label><br>
        <input type="file" class="form-control-file mb-2 col-12 text-center changer-image-input-modif-serie" id="imageSerie" name="imageSerie">
    </div>
    <input type="hidden" name="identifiant" value="<?= $serie->getId(); ?>">
    <div class="form-group">
        <label for="noteSerie" class="mb-2 text-light titre-note-ajout-serie">Note : </label>
        <input type="number" class="form-control mb-2 note-input-ajout-serie" id="noteSerie" name="noteSerie" value="<?= $serie->getNoteSerie() ?>">
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-modif-serie mb-3 mt-2">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Modification de la série : " . " " . "'" .$serie->getTitreSerie() . "'";
require "views/template.view.php";
?>