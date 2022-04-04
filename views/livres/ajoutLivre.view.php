<?php 
ob_start();
?>

<style>
<?php 
    include "public/css/livres/ajoutLivreForm.css"; 
    include "public/css/template.css"; 
?>
</style>

<form method="POST" action="<?= URL ?>livres/av" enctype="multipart/form-data">
    <div class="form-group">
        <label for="titre" class="mt-3 mb-3 text-light titre-ajout">Titre : </label>
        <input type="text" class="form-control mb-3 titre-input-ajout" id="titre" name="titre" placeholder="Renseignez le titre ici">
    </div>
    <div class="form-group">
        <label for="nbPages" class="mt-2 mb-3 text-light titre-nombre-pages-ajout">Nombre de pages : </label>
        <input type="number" class="form-control mb-3 nombre-pages-input-ajout" id="nbPages" name="nbPages" placeholder="Renseignez le nombre de pages ici">
    </div><br>
    <div class="form-group">
        <label for="image" class="mb-5 text-light titre-image-ajout">Image : </label><br>
        <input type="file" class="form-control-file mb-3 col-12 text-center image-input-ajout" id="image" name="image">
    </div><br>
    <div class="col-12 text-center">
        <button type="submit" class="btn btn-validation-ajout mt-3 mb-2">Valider</button>
    </div>
</form>

<?php 
$content = ob_get_clean();
$titre = "Ajout d'un livre";
require "views/template.view.php"; 
?>