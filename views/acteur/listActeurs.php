<?php

ob_start();

?>

<head>
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<div class="flex">
    <h2><?= $acteurs->rowCount() ?> acteurs enregistrés</h2>
</div>
<main>
    <table>
        <thead>
            <tr>
                <th>Nom de l'acteur</th>
                <th>Date de Naissance</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($acteur = $acteurs->fetch()) {
                echo "<tr><td><a href='index.php?action=detailActeur&id=" . $acteur['idacteur'] . "'>" . $acteur['identite'] . "</a></td>";
                echo "<td>" . $acteur['naissance'] . "</td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>

<?php

$acteurs->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";
