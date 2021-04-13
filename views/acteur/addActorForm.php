<?php

ob_start();


?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2>Ajouter un acteur</h2>
   <form class="flex column" action="./index.php?action=ajouterActeur" method="post">
      <div class="flex column">
         <label for="nom_act"><strong>Nom de l'acteur:</strong></label>
         <input type="text" id="nom_act" name="nom_act" placeholder="De Niro..." required>
      </div>
      <div class="flex column">
         <label for="prenom_act">Prenom de l'acteur</label>
         <input type="text" id="prenom_act" name="prenom_act" placeholder="Robert..." required>
      </div>
      <div class="flex column">
         <label for="nom_act">Date de naissance</label>
         <input type="date" id="naissance_real" name="naissance__real" placeholder="Année de sortie..." required>
      </div>
      <div class="flex column">
         <p>Sexe de l'acteur:</p>
         <input type="checkbox" name="M">
         <label for="M">M</label>
        <input type="checkbox" name="F">
         <label for="F">F</label>
      </div>
      <div class="flex column">
         <textarea id="bio_real" name="bio_real" placeholder="Biographie..." required></textarea>
      </div>
      <div class="flex column">
         <input type="file" id="img_real" name="img_real" placeholder="Image du realisateur..." required>
      </div>
      <div> 
         <input type="submit" placeholder="Ajouter" value="Ajouter">
      </div>
   </form>
</section>
<?php
$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";
