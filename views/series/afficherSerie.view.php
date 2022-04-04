<?php 
ob_start(); 
?>

<style>
<?php 
    include "public/css/series/afficherSerie.css"; 
    include "public/css/template.css"; 
?>
</style>


<div class="row text-center pb-3">
    <p><span>Titre:</span> <?= $serie->getTitreSerie(); ?></p>
</div>

<div class="row text-center">
    <div class="col-12 pb-3">
        <img class="serie-img pb-3" src="<?= URL ?>public/imgSeries/<?= $serie->getImageSerie(); ?>"  >
    </div>
</div>

<div class="row text-center pb-3">   
        <p><span>Nombre de saisons:</span> <?= $serie->getNbSaison(); ?></p>
</div> 

<div class="row text-center pb-3">   
        <p><span>Année de sortie:</span> <?= $serie->getAnneeSortieSerie(); ?></p>
</div> 
<div class="row text-center">   
        <p><span>Note:</span> <?= $serie->getNoteSerie(); ?> /10</p>
</div> 

<div class="col-12 text-center">
    <a href="<?= URL ?>series" class="btn back-series mt-3 mb-2"> Retour</a>
</div>


<?php
$content = ob_get_clean();
$titre = $serie->getTitreSerie();
require "views/template.view.php";
?>