<?php 
ob_start() 
?>

<style>
<?php include "public/css/films/films.css"; ?>
</style>

<div class="tableau-films">
    <table class="table text-center border-secondary pb-3">
        <tr class="table-primary mb-5">
            <th>Image</th>
            <th>Titre</th>
            <th>Année</th>
            <th>Note</th>
            <th colspan="2">Actions</th>
        </tr>
        <?php
        
        for($i=0; $i < count($films); $i++) : 
            ?>
        <tr>
            <td class="align-middle col-1 pb-2 pt-2 image-liste-films" ><a href="<?= URL ?>films/l/<?= $films[$i]->getId(); ?>"><img src="public/imgFilms/<?= $films[$i]->getImageFilm() ?>" id="moovie-img" alt="image-film"></a></td>
            <td class="align-middle col-4 titre-liste"><a href="<?= URL ?>films/l/<?= $films[$i]->getId(); ?>" style="text-decoration:none" class="titre-film-liste"><?= $films[$i]->getTitreFilm(); ?></a></td>
            <td class="align-middle col-1 annee-sortie-films"><?= $films[$i]->getAnneeSortie(); ?></td>
            <td class="align-middle col-1 note-films"><?= $films[$i]->getNoteFilm(); ?></td>
            <td class="align-middle col-2 modifier-btn"><a href="<?= URL ?>films/m/<?= $films[$i]->getId(); ?>" class="btn border-secondary moovie-update">Modifier</a></td>
            <td class="align-middle col-2 supprimer-btn">
                <form method="POST" action="<?= URL ?>films/s/<?= $films[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le film ?');">
                    <button class="btn  moovie-delete" type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        <?php endfor; ?>
    </table>
</div>

        <div class="col-12 text-center">
        <a href="<?= URL ?>films/a" class="btn moovie-add mt-3 mb-3">Ajouter</a>
        </div>

    <?php 
    $content = ob_get_clean();
    $titre = "La liste des films";
    require "views/template.view.php"; 
    ?>