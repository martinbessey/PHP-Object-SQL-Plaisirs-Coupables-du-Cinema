<?php

ob_start();


?>
<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2> Ajouter un film</h2>
   <form class="flex" action="./index.php?action=ajouterFilm" method="post">
      <div>
         <label for="titre_film">Titre du film:</label>
         <input type="text" id="titre_film" name="titre_film" placeholder="Titre du film..." required>
      </div>
      <div> 
         <label for="titre_film">Année de sortie:</label>
         <input type="date" id="annee_film" name="annee_film" placeholder="Année de sortie..." required>
      </div>
      <div>
         <label for="titre_film">Réalisateur:</label>
         <input type="text" id="realisateur_film" name="realisateur_film" placeholder="réalisateur..." required>
      </div>
      <div>
         <label for="titre_film">Durée (en min.):</label>
         <input type="number" id="duree_film" name="duree_film" min="0" max="500" placeholder="Durée..." required>
      </div>
      <div>
         <label for="titre_film">Synopsis:</label>
         <textarea id="synopsis_film" name="synopsis_film" placeholder="Sinopsys..." required></textarea>
      </div>
      <div>
         <label for="titre_film">indice de culpabilité:</label>
         <input type="number" id="indice_film" name="indice_film" min="0" max="10" placeholder="Indice de culpabilité.." required>
      </div>
      <div>
         <label for="titre_film">Affiche du film:</label>
         <input type="file" id="img_film" name="img_film" placeholder="Affiche du Film..." required>
      </div>
      <div>
         <label for="titre_film">Genre(s):</label>
         <select name="genre_film[]" multiple required>
         <?php
         while($nomGenre=$listeGenres->fetch()){
            echo "<option value=". $nomGenre['idgenre'].">".$nomGenre['nom']."</option>";
         }
         ?>
      </div>
      <div>
         <input type="submit" placeholder="Ajouter" value="Ajouter">
      </div>
   </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";
