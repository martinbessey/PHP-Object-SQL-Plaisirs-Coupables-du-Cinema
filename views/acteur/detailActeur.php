<?php

ob_start();
$detailAct = $acteurs->fetch();



?>

<head>
    <link rel="stylesheet" href="/css//detail_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<div class="flex">
    <h2>Gros plan sur <?= $detailAct['identite'] ?></h2>
</div>
<main class="flex wrap">
    <article>
        <figure>
            <img src="../../<?= $detailAct['img'] ?>">
        </figure>
        <h4><?= $detailAct['identite'] ?></h4>
        <span>
            <?= $detailAct['naissance'] ?>
        </span>
        <br>
        <br>
        <span>
            <strong>Bio:<br></strong><?= $detailAct['bio'] ?>
        </span>
        <h4>Filmographie coupable:</h4>
        <ul>
            <?php
            while ($filmographie = $filmographies->fetch()) {
                echo "<li><a href='index.php?action=detailFilm&id=" . $filmographie['idfilm'] . "'>" . $filmographie['titre'] . "</a> (" . $filmographie['personnage'] . ")";
            }
            ?>
        </ul>
    </article>
    <span><a href="index.php?action=editActeurForm"><strong>Modifier </strong></a>cet acteur</span>
    <span><a href="index.php?action=ajouterActeurForm"><strong>Ajouter </strong></a>un acteur</span>
    </body>

    </html>

    <?php

    $acteurs->closeCursor();
    $contenu = ob_get_clean();
    require "views/template.php";
