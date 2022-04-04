<?php 
ob_start();
?>

<style>
<?php 
    include "public/css/films/modifierFilm.css"; 
    // include "public/css/template.css"; 
?>
</style>

<form method="POST" action="<?= URL ?>films/mv" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titreFilm" class="mt-2 mb-2 text-light titre-modif-film">Titre : </label>
        <input type="text" class="form-control mb-2 titre-input-modif-film" id="titreFilm" name="titreFilm" value="<?= $film->getTitreFilm() ?>">
    </div>
    <div class="form-group">
        <label for="anneeSortie" class="mt-2 mb-2 text-light titre-annee-sortie-modif-film">Année de sortie : </label>
        <input type="number" class="form-control mb-2 annee-sortie-input-modif-film" id="anneeSortie" name="anneeSortie" value="<?= $film->getAnneeSortie() ?>">
    </div>
        <label class="mb-2 text-light titre-image-modif-film">Image : </label>
    <div class="row">
        <div class="text-center">
            <img src="<?= URL ?>public/imgFilms/<?= $film->getImageFilm() ?>"  class="align-items-center image-modif-film">
        </div>
    </div>
    <div class="form-group">
        <label for="imageFilm" class="mt-2 mb-2 text-light titre-changer-image-modif-film">Changer l'image : </label><br>
        <input type="file" class="form-control-file mb-2 col-12 text-center changer-image-input-modif-film" id="imageFilm" name="imageFilm">
    </div>
    <input type="hidden" name="identifiant" value="<?= $film->getId(); ?>">
    <div class="form-group">
        <label for="noteFilm" class="mt-2 mb-2 text-light titre-note-ajout-film">Note : </label>
        <input type="number" class="form-control mb-2 note-input-ajout-film" id="noteFilm" name="noteFilm" value="<?= $film->getNoteFilm() ?>">
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-modif-film mt-2 mb-3">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Modification du film : " . " " . "'" .$film->getTitreFilm() . "'";
require "views/template.view.php";
?>