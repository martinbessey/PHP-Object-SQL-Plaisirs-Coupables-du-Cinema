<?php

ob_start();

$detailReal = $realisateur->fetch();



?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css//detail_style.css">
    <title>Plaisirs coupables du cinéma</title>
</head>
<div class="flex">
    <h2>Gros plan sur <?= $detailReal['identite'] ?></h2>
</div>
<main class="flex wrap">
    <article>
        <figure>
            <img src="../../<?= $detailReal['img'] ?>">
        </figure>
        <h4><?= $detailReal['identite'] ?></h4>
        <span>
            <?= $detailReal['naissance'] ?>
        </span>
        <br>
        <br>
        <span>
            <strong>Bio:<br></strong><?= $detailReal['bio'] ?>
        </span>
        <a href="index.php?action=filmographieReal" class="btn">Filmographie</a>
    </article>
    <span>Vous souhaitez ajouter un réalisateur?<a href="index.php?action=ajouterReal"><strong>Cliquez ici</strong></a></span>
    <footer>
        <small>Made by Martin Bessey © All rights reserved 2021</small>
    </footer>
</body>
</html>    

    <?php

    $realisateur->closeCursor();
    $titre = "detail real";
    $contenu = ob_get_clean();
    require "views/template.php";
