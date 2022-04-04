<?php 
ob_start();
?>

<style>
<?php 
    include "public/css/series/ajoutSerie.css"; 
    include "public/css/template.css"; 
?>
</style>

<form method="POST" action="<?= URL ?>series/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titreSerie" class="mt-2 mb-3 text-light titre-ajout-serie">Titre : </label>
        <input type="text" class="form-control mb-3 titre-input-ajout-serie" id="titreSerie" name="titreSerie" placeholder="Renseignez le titre ici">
    </div>
    <div class="form-group">
        <label for="nbSaison" class="mt-2 mb-3 text-light titre-nombre-saison-ajout-serie">Nombre de saisons : </label>
        <input type="number" class="form-control mb-3 nombre-saison-input-ajout-serie" id="nbSaison" name="nbSaison" placeholder="Renseignez le nombre de saisons">
    </div><br>
    <div class="form-group">
        <label for="anneeSortieSerie" class="mt-2 mb-3 text-light titre-annee-sortie-ajout-serie">Année de sortie : </label>
        <input type="number" class="form-control mb-3 annee-sortie-input-ajout-serie" id="anneeSortieSerie" name="anneeSortieSerie" placeholder="Renseignez l'année de sortie ici">
    </div><br>
    <div class="form-group">
        <label for="imageSerie" class="mb-3 text-light titre-image-ajout-serie">Image : </label><br>
        <input type="file" class="form-control-file mb-3 col-12 text-center image-input-ajout-serie" id="imageSerie" name="imageSerie">
    </div><br>
    <div class="form-group">
        <label for="noteSerie" class="mt-2 mb-3 text-light titre-note-ajout-serie">Note : </label>
        <input type="number" class="form-control mb-3 note-input-ajout-serie" id="noteSerie" name="noteSerie" placeholder="Renseignez votre note ici">
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-ajout-serie mb-3 mt-5">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Ajout d'une série";
require "views/template.view.php"; 
?>