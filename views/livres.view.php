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
        <td class="align-middle" ><img src="public/img/<?= $livres[$i]->getImage() ?>" id="book-img" alt="book-cover"></td>
        <td class="align-middle"><?= $livres[$i]->getTitre(); ?></td>
        <td class="align-middle"><?= $livres[$i]->getNbPages(); ?></td>
        <td class="align-middle"><a href="#" class="btn btn-outline-light book-update">Modifier</a></td>
        <td class="align-middle"><a href="#" class="btn btn-outline-light book-delete">Supprimer</a></td>
    </tr>
    <?php endfor; ?>
    </table>

        <div class="col text-center">
        <a href="#" class="btn btn-outline-light book-add">Ajouter</a>
        </div>

    <?php 
    $content = ob_get_clean();
    $titre = "La liste des livres";
    require "template.view.php"; 
    ?>