<?php 
ob_start() 
?>

<style>
    <?php include "public/css/accueil.css"; ?>
</style>

<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide">
            <a class="titre-accueil-livres" href="<?= URL ?>livres">Livres</a>
        </div>
        <div class="swiper-slide">
            <a class="titre-accueil-films" href="<?= URL ?>films">Films</a>
        </div>
        <div class="swiper-slide">
            <a class="titre-accueil-series" href="<?= URL ?>series">Series</a>
        </div>
    </div>
</div>

<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        
        var swiper = new Swiper(".mySwiper", {
            effect: "cards",
            grabCursor: true,
        });
</script>

<?php 
$content = ob_get_clean();
$titre = "Bienvenue dans ma bibliothèque en ligne";
require "template.view.php"; 
?>