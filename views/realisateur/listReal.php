<?php

ob_start();

?>

<head>
    <link rel="stylesheet" href="/css//list_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>
<div class="flex">
    <h2><?= $realisateurs->rowCount() ?> réalisateurs enregistrés</h2>
</div>
<main>
    <table>
        <thead>
            <tr>
                <th>Nom du réalisateur</th>
                <th>Date de Naissance</th>
                <th>Sexe</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($realisateur = $realisateurs->fetch()) {
                echo "<tr><td><a href='index.php?action=detailRealisateur&id=" . $realisateur['idreal'] . "'>" . $realisateur['identite'] . "</a></td>";
                echo "<td>" . $realisateur['naissance'] . "</td>";
                echo "<td>" . $realisateur['sexe'] . "<td></tr>";
            }
            ?>
        </tbody>
    </table>
</main>
<span>Vous souhaitez ajouter un nouveau réalisateur?<a href="index.php?action=ajouterRealForm"><strong>Cliquez ici</strong></a></span>
<?php

$realisateurs->closeCursor();
$contenu = ob_get_clean();
require "views/template.php";