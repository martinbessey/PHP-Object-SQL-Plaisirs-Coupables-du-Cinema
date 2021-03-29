<?php

ob_start();

$filmographie = $realisateurs->fetch();


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

<body>
    <div class="flex">
        <h2>Filmographie de<?= $filmographie['identite'] ?></h2>
    </div>
    <table>
        <thread>
            <tr>
                <th>Titre</th>
                <th>Film </th>
            </tr>

        </thread>
        <tbody>
            <?php
            while ($realisateur = $realisateurs->fetch()) {
                echo "<tr><td><a href='index.php?action=detailFilm&id=" . $realisateur['idreal'] . ">" . $realisateur['titre'] . "</a></td>";
                echo "<td>" . $realisateur['annee'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

<?php

$realisateurs->closeCursor();
$titre = "Filmographie";
$contenu = ob_end_clean();
require "views/template.php";
