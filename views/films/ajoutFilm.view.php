<?php 
ob_start();
?>

<style>
<?php 
    include "public/css/films/ajoutFilmForm.css";
    include "public/css/template.css"; 
?>
</style>

<form method="POST" action="<?= URL ?>films/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titreFilm" class="mt-4 mb-3 text-light titre-ajout-film">Titre : </label>
        <input type="text" class="form-control mb-3 titre-input-ajout-film" id="titreFilm" name="titreFilm" placeholder="Renseignez le titre ici">
    </div>
    <div class="form-group">
        <label for="anneeSortie" class="mt-2 mb-3 text-light titre-annee-sortie-ajout-film">Année de sortie : </label>
        <input type="number" class="form-control mb-3 annee-sortie-input-ajout-film" id="anneeSortie" name="anneeSortie" placeholder="Renseignez l'année de sortie ici">
    </div><br>
    <div class="form-group">
        <label for="imageFilm" class="mb-3 text-light titre-image-ajout-film">Image : </label><br>
        <input type="file" class="form-control-file mb-3 col-12 text-center image-input-ajout-film" id="imageFilm" name="imageFilm">
    </div><br>
    <div class="form-group">
        <label for="noteFilm" class="mt-2 mb-3 text-light titre-note-ajout-film">Note : </label>
        <input type="number" class="form-control mb-3 note-input-ajout-film" id="noteFilm" name="noteFilm" placeholder="Renseignez votre note ici">
    </div>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-ajout-film mb-3 mt-5">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Ajout d'un film";
require "views/template.view.php"; 
?>