<?php 
ob_start() 
?>

<style>
<?php include "public/css/livres/livres.css"; ?>
</style>

<div class="tableau-livres">
    <table class="table text-center border-secondary rounded ">
        <tr class="table-primary mb-5 data-sticky-header">
            <th>Image</th>
            <th>Titre</th>
            <th>Pages</th>
            <th colspan="2">Actions</th>
        </tr>
        
        <?php
        
        for($i=0; $i < count($livres); $i++) : 
            ?>
        <tr>
            <td class="align-middle col-1 pb-2 pt-2 image-liste-livres" ><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId(); ?>"><img src="public/imgLivres/<?= $livres[$i]->getImage() ?>" id="book-img" alt="book-cover"></a></td>
            <td class="align-middle col-4 titre-liste"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId(); ?>" style="text-decoration:none" class="titre-livre-liste"><?= $livres[$i]->getTitre(); ?></a></td>
            <td class="align-middle col-1 nombre-pages"><?= $livres[$i]->getNbPages(); ?></td>
            <td class="align-middle col-2 modifier-btn"><a href="<?= URL ?>livres/m/<?= $livres[$i]->getId(); ?>" class="btn border-secondary book-update">Modifier</a></td>
            <td class="align-middle col-2 supprimer-btn">
                <form method="POST" action="<?= URL ?>livres/s/<?= $livres[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
                    <button class="btn  book-delete" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endfor; ?>
    </table>
</div>

        <div class="col-12 text-center">
        <a href="<?= URL ?>livres/a" class="btn book-add mt-3 mb-3">Ajouter</a>
        </div>

    <?php 
    $content = ob_get_clean();
    $titre = "La liste des livres";
    require "views/template.view.php"; 
    ?>