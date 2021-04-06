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
         <input type="text" id="titre_film" name="titre_film" placeholder="Titre du film..." required>
      </div>
      <div> 
         <input type="text" id="annee_film" name="annee_film" placeholder="Année de sortie..." required>
      </div>
      <div>
         <input type="text" id="realisateur_film" name="realisateur_film" placeholder="réalisateur..." required>
      </div>
      <div>
         <input type="text" id="duree_film" name="duree_film" placeholder="Durée..." required>
      </div>
      <div>
         <input type="text" id="synopsis_film" name="synopsis_film" placeholder="Sinopsys..." required>
      </div>
      <div>
         <input type="text" id="indice_film" name="indice_film" placeholder="Indice de culpabilité.." required>
      </div>
      
      <div>
         <input type="submit" placeholder="Ajouter" value="Ajouter">
      </div>
   </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";
