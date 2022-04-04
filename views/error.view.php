<?php 
ob_start() 
?>

<style>
<?php
 include "public/css/template.css"; 
 ?>
</style>

<div class="erreur-msg text-center mb-5 mt-5">
    <?= $msg ?>
</div>

<div class="row text-center erreur-btn justify-content-center">
    <a href="<?= URL ?>accueil" class="retour-erreur col-2">Retour</a>
</div>

<?php 
$content = ob_get_clean();
$titre = "Oops, erreur";
require "template.view.php"; 
?>