<?php 
ob_start() 
?>

<table class="table text-center">
    <tr class="table-light pb-3">
        <th>Image</th>
        <th>Titre</th>
        <th>Pages</th>
        <th colspan="2">Actions</th>
    </tr>
    <?php
    
    for($i=0; $i < count($livres); $i++) : 
        ?>
    <tr>
        <td class="align-middle" ><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId(); ?>"><img src="public/img/<?= $livres[$i]->getImage() ?>" id="book-img" alt="book-cover"></a></td>
        <td class="align-middle"><a href="<?= URL ?>livres/l/<?= $livres[$i]->getId(); ?>"><?= $livres[$i]->getTitre(); ?></a></td>
        <td class="align-middle"><?= $livres[$i]->getNbPages(); ?></td>
        <td class="align-middle"><a href="#" class="btn btn-outline-light book-update">Modifier</a></td>
        <td class="align-middle">
            <form method="POST" action="<?= URL ?>livres/s/<?= $livres[$i]->getId(); ?>" onSubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
                <button class="btn btn-danger" type="submit">Supprimer</button>
            </form>
        </td>
    </tr>
    <?php endfor; ?>
    </table>

        <div class="col text-center">
        <a href="<?= URL ?>livres/a" class="btn btn-outline-light book-add">Ajouter</a>
        </div>

    <?php 
    $content = ob_get_clean();
    $titre = "La liste des livres";
    require "template.view.php"; 
    ?>