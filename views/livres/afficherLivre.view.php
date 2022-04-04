<?php 
ob_start(); 
?>

<style>
<?php 
    include "public/css/livres/afficherLivre.css"; 
    include "public/css/template.css"; 
?>
</style>

<div class="row text-center pt-3 pb-4">
    <p><span>Titre:</span> <?= $livre->getTitre(); ?></p>
</div>

<div class="row text-center">
    <div class="col-12 pb-4">
        <img class="livre-img pb-3" src="<?= URL ?>public/imgLivres/<?= $livre->getImage(); ?>"  >
    </div>
</div>

<div class="row text-center">   
        <p><span>Nombre de pages:</span> <?= $livre->getNbPages(); ?></p>
</div> 


<div class="col-12 text-center">
    <a href="<?= URL ?>films" class="btn back-books mt-3 mb-3"> Retour</a>
</div>


<?php
$content = ob_get_clean();
$titre = $livre->getTitre();
require "views/template.view.php";
?>