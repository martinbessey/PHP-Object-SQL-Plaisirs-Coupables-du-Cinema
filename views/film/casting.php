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

<body>
    <div class="flex">
        <h2>Casting du film:</h2>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Réalisateur</th>
                    <th>Indice de culpabilité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($casting = $castings->fetch()) {
                    echo "<tr><td><a href='index.php?action=casting&id=" . $casting['idacteur'] . "'>" . $casting['identite'] . "</a></td>";
                    echo "<td>" . $film['sexe'] . "</td>";
                }
                ?>
            </tbody>
        </table>
    </main>
    <footer>
    <small>Made by Martin Bessey © All rights reserved 2021</small>
    </footer>
</body>
</html>

<?php

$films->closeCursor();
$titre = "Casting";
$contenu = ob_get_clean();
require "views/template.php";
