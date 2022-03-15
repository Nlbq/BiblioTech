<?php 
ob_start() 
?>

Page d'accueil

<?php 
$content = ob_get_clean();
$titre = "Bienvenue dans ma bibliothèque en ligne";
require "template.view.php"; 
?>