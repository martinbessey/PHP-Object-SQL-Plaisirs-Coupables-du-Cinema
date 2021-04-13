<?php

ob_start();

$editFilm = $edit1->fetch();

?>

<head>
    <link rel="stylesheet" href="/css//form_style.css">
    <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
    <h2> Modifier un film</h2>
    <form class="flex" action="./index.php?action=editFilm&id=<?$editFilm['idfilm']?>" method="post">
        <div>
            <label for="titre_film">Titre du film:</label>
            <input type="text" id="titre_film" name="titre_film" value=<?= $editFilm['titre'] ?> required>
        </div>
        <div>
            <label for="titre_film">Année de sortie:</label>
            <input type="date" id="annee_film" name="annee_film" value=<?= $editFilm['annee'] ?>>
        </div>
        <div>
            <label for="titre_film">Réalisateur:</label>
            <div>
                <select name="realisateur" size="1">
                    <?php
                    while ($nomRealisateur = $edit4->fetch()) {
                        echo "<option value=" . $nomRealisateur['id_realisateur'];
                        if ($nomRealisateur['idreal'] == $editFilm['idreal']) {
                            echo " selected ";
                        }
                        echo ">" . $nomRealisateur['RealNom'] . "</option>";
                    }
                    ?>
                </select>
            </div>
        </div>
        <div>
            <label for="titre_film">Durée (en min.):</label>
            <input type="number" id="duree_film" name="duree_film" min="0" max="500" value=<?= $editFilm['duree'] ?>>
        </div>
        <div>
            <label for="titre_film">Synopsis:</label>
            <textarea id="synopsis_film" name="synopsis_film" value=<?= $editFilm['synopsis'] ?>></textarea>
        </div>
        <div>
            <label for="titre_film">indice de culpabilité:</label>
            <input type="number" id="indice_film" name="indice_film" min="0" max="10" value=<?= $editFilm['indice'] ?>>
        </div>
        <div>
            <label for="titre_film">Affiche du film:</label>
            <input type="file" id="img_film" name="img_film" placeholder="Affiche du Film..." value=<?= $editFilm['img'] ?>>
        </div>
        </div>
        <?php 
        $tableauGenres = array();

        while ($findIdGenre = $edit2->fetch() ){
            array_push($tableauGenres, $findIdGenre['idgenre'] );
        }
        ?>
        <div>
            <select name="genref[]"  multiple  required >
                <?php
                    while($nomGenre = $edit3->fetch()){
                        echo "<option value=".$nomGenre['idgenre'];
                        if (in_array($nomGenre['idgenre'], $tableauGenres)){
                            echo " selected";


                        }
                        echo ">".$nomGenre['nom']."</option>";
                    }
                ?>
            </select>
        </div>
        <div>
            <input type="submit" placeholder="Modifier" value="Modifier">
        </div>
    </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";
