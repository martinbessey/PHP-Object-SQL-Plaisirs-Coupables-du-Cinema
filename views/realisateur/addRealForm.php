<?php

ob_start();


?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2> Ajouter un réalisateur</h2>
   <form class="flex" action="./index.php?action=ajouterReal" method="post">
      <div>
         <input type="text" id="titre_real" name="titre_real" placeholder="Nom du realisateur..." required>
      </div>
      <div>
         <input type="date" id="naissance_real" name="naissance__real" placeholder="Année de sortie..." required>
      </div>
      <p>Sexe du réalisateur:</p>
      <div class="flex">
         <input type="checkbox" name="M">
         <label for="M">M</label>
      </div>
      <div>
         <input type="checkbox"name="F">
         <label for="F">F</label>
      </div>
      <div>
         <textarea id="bio_real" name="bio_real" placeholder="Biographie..." required></textarea>
      </div>
      <div>
         <input type="file" id="img_real" name="img_real" placeholder="Image du realisateur..." required>
      </div>
      <div>
         <input type="submit" placeholder="Ajouter" value="Ajouter">
      </div>
   </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";
