<?php

ob_start();

?>


<head>
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<body>
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
                    <th>Indice de culpabilité</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($film = $films->fetch()) {
                    echo "<tr><td><a href='index.php?action=detailFilm&id=" . $film['idfilm'] . "'>" . $film['titre'] . "</a></td>";
                    echo "<td>" . $film['annee'] . "</td>";
                    echo "<td><a href='index.php?action=detailRealisateur&id=" . $film['idreal'] . "'>" . $film['nom'] . "</a></td>";
                    echo "<td>" . $film['indice'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>
<small>Vous souhaitez ajouter un nouveau film?<a href="index.php?action=ajouterFilmForm"><strong>Cliquez ici</strong></a></small>

<?php

$films->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";
