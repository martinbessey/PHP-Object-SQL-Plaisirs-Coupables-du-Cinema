<?php

ob_start();

$detailFilm = $film->fetch();


?>

<head>
    <link rel="stylesheet" href="/css//detail_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
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
        <span class=durée>
            <strong>Durée:</strong><?= $detailFilm['duree'] ?>
        </span>

        <h4>Synopsis: </h4>
        <p>
            <?= $detailFilm['synopsis'] ?>
        </p>
        <span>
            <strong>Indice de culpabilité: </strong><?= $detailFilm['indice'] ?>/10
        </span>
        <h4>Casting:</h4>
        <ul>
            <?php
            while ($casting = $castings->fetch()) {
                echo "<li><a href='index.php?action=detailActeur&id=" . $casting['idacteur'] . "'>" . $casting['identite'] . "</a> (" . $casting['personnage'] . ")";
            }
            ?>
        </ul>
    </article>
</main>

<?php
$film->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";
