<?php

ob_start();

$detailReal = $realisateur->fetch();



?>


<head>
    <link rel="stylesheet" href="/css//detail_style.css">
</head>
<div class="title flex">
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
        <span>
            <strong>Bio:<br></strong><?= $detailReal['bio'] ?>
        </span>
        </span><h4>Films dans notre liste:</h4>
        <ul>
            <?php
            while ($filmographie = $filmographies->fetch()) {
                echo "<li><a href='index.php?action=detailFilm&id=" . $filmographie['idfilm'] . "'>" . $filmographie['titre'] . "</a> (" . $filmographie['annee'] . ")";
            }
            ?>
        </ul>
        <div>
        <a  href="index.php?action=editRealForm&id=<?= $detailReal['idreal'] ?>" class="edit">Modifier</a>
        </div>
    </article>
</main> 


    <?php

    $realisateur->closeCursor();
    $contenu = ob_get_clean();
    require "views/template.php";
