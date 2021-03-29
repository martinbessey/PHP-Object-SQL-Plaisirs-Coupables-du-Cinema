<?php

ob_start();

$detailFilm = $film->fetch();


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

<body>
    <div class="flex">
        <h2>Gros plan sur <?= $detailFilm['titre'] ?></h2>
    </div>
    <main class="flex wrap" style="background-image:url('../../<?= $detailFilm['background'] ?>');background-size:cover;">
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
                <strong>Synopsis: </strong><br>
                <br><?= $detailFilm['synopsis'] ?>
            </span>
            <br>
            <br>
            <span>
                <strong>Indice de culpabilité: </strong><?= $detailFilm['indice'] ?>/10
            </span>
            <br>
            <br>
            <br>
            <a class="btn" href="index.php?action=casting">Casting</a>
        </article>
        <footer>
            <small>Made by Martin Bessey © All rights reserved 2021</small>
        </footer>
</body>

</html>

<?php
$film->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";
