<?php

ob_start();

$detailFilm = $film->fetch();
// var_dump($detailFilm);

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css//detail_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<div class="flex">
    <h2>Gros plan sur <?= $detailFilm['titre'] ?></h2>
</div>
<main class="flex wrap"  style="background-image:url('../../<?= $detailFilm['background'] ?>')">
    <article>
        <figure>
            <img src="../../<?= $detailFilm['img'] ?>">
        </figure>
        <h4><?= $detailFilm['titre'] ?></h4>
        <span>
            <?= $detailFilm['annee'] ?>
        </span>
        <br>
        <br>
        <span>
            <strong>Durée:</strong><?= $detailFilm['duree'] ?>
        </span>
        <br>
        <br>
        <span>
            <strong >Synopsis: </strong><br>
            <br><?= $detailFilm['synopsis'] ?>
        </span>
        <br>
        <br>
        <span>
            <strong>Indice de culpabilité: </strong><?= $detailFilm['indice'] ?>/10
        </span>
    </article>

    <?php
    $film->closeCursor();
    $contenu = ob_get_clean();
    require "views/template.php";
