<?php 
ob_start() 
?>

<style>
<?php include "public/css/series/series.css"; ?>
</style>

<div class="tableau-series">
    <table class="table text-center border-secondary rounded pb-3">
        <tr class="table-primary mb-5">
            <th>Image</th>
            <th>Titre</th>
            <th>Saisons</th>
            <th>Année</th>
            <th>Note/10</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        
        for($i=0; $i < count($series); $i++) : 
            ?>
        <tr>
            <td class="align-middle col-1 pb-2 pt-2 image-liste-series" ><a href="<?= URL ?>series/l/<?= $series[$i]->getId(); ?>"><img src="public/imgSeries/<?= $series[$i]->getImageSerie() ?>" id="serie-img" alt="image-serie"></a></td>
            <td class="align-middle col-2 titre-liste"><a href="<?= URL ?>series/l/<?= $series[$i]->getId(); ?>" style="text-decoration:none" class="titre-serie-liste"><?= $series[$i]->getTitreSerie(); ?></a></td>
            <td class="align-middle col-1 nbSaison"><?= $series[$i]->getNbSaison(); ?></td>
            <td class="align-middle col-1 annee-sortie-series"><?= $series[$i]->getAnneeSortieSerie(); ?></td>
            <td class="align-middle col-1 note-series"><?= $series[$i]->getNoteSerie(); ?></td>
            <td class="align-middle col-2 modifier-btn"><a href="<?= URL ?>series/m/<?= $series[$i]->getId(); ?>" class="btn border-secondary serie-update">Modifier</a></td>
            <td class="align-middle col-2 supprimer-btn">
                <form method="POST" action="<?= URL ?>series/s/<?= $series[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le serie ?');">
                    <button class="btn  serie-delete" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endfor; ?>
    </table>
</div>

        <div class="col-12 text-center">
        <a href="<?= URL ?>series/a" class="btn serie-add mt-3 mb-3">Ajouter</a>
        </div>

    <?php 
    $content = ob_get_clean();
    $titre = "La liste des séries";
    require "views/template.view.php"; 
    ?>