<?php

ob_start();

?>

<head>
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
    <div class="flex">
        <h2>Liste des genres cinématographiques</h2>
    </div>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Genre</th>
                    <th>Nombre de films enregistrés</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($genre = $genres->fetch()) {
                    echo "<tr><td><a href='index.php?action=detailGenre&id=" . $genre['idgenre'] . "'>" . $genre['nom'] . "</a></td>";
                    echo "<td>" . $genre['nb_films'] . "</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </main>


<?php

$genres->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";