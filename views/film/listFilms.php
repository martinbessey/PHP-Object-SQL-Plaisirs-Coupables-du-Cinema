<?php

ob_start();

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<div class="flex">
    <h2><?= $films->rowCount(); ?> films enregistrés</h2>
</div>
<main>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>Année</th>
                <th>Réalisateur</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($film = $films->fetch()) {
                echo "<tr><td><a href='index.php?action=detailFilm&id=" . $film['idfilm'] . "'>" . $film['titre'] . "</a></td>";
                echo "<td>" . $film['annee'] . "</td>";
                echo "<td><a href='index.php?action=detailRealisateur&id=" . $film['idreal'] . "'>" . $film['nom'] . "</a></td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>



<?php

$films->closeCursor();
$titre = "La liste de films";
$contenu = ob_get_clean();
require "views/template.php";
