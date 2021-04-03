<?php

ob_start();
$filmDefilmGenres = $filmDeGenres->fetch();

?>


<head>
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<body>
    <div class="flex">
        <h2><?= $filmDefilmGenres['nom']; ?></h2>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Année</th>
                    <th>Indice de culpabilité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($filmDeGenre = $filmDeGenres->fetch()) {
                    echo "<tr><td><a href='index.php?action=detailFilm&id=" . $filmDeGenre ['idfilm'] . "'>" . $filmDeGenre['titre'] . "</a></td>";
                    echo "<td>" . $filmDeGenre['annee'] . "</td>";
                    echo "<td>" . $filmDeGenre['indice'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>

<?php

$filmDeGenres->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";
