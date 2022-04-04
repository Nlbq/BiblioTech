<?php 
ob_start(); 
?>

<style>
<?php 
    include "public/css/films/afficherFilm.css"; 
    include "public/css/template.css"; 
?>
</style>


<div class="row text-center pb-3">
    <p><span>Titre:</span> <?= $film->getTitreFilm(); ?></p>
</div>

<div class="row text-center">
    <div class="col-12 pb-3">
        <img class="film-img pb-3" src="<?= URL ?>public/imgFilms/<?= $film->getImageFilm(); ?>"  >
    </div>
</div>

<div class="row text-center pb-3">   
        <p><span>Année de sortie:</span> <?= $film->getAnneeSortie(); ?></p>
</div> 
<div class="row text-center">   
        <p><span>Note:</span> <?= $film->getNoteFilm(); ?> /10</p>
</div> 

<div class="col-12 text-center">
    <a href="<?= URL ?>films" class="btn back-moovies mt-3 mb-3"> Retour</a>
</div>


<?php
$content = ob_get_clean();
$titre = $film->getTitreFilm();
require "views/template.view.php";
?>