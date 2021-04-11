<?php

ob_start();


?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2> Ajouter un acteur</h2>
   <form class="flex" action="./index.php?action=ajouterActeur" method="post">
   <div>
         <input type="text" id="titre_act" name="titre_act" placeholder="Nom de l'acteur..." required>
      </div>
      <div> 
         <input type="date" id="naissance_act" name="naissance__act" placeholder="Année de sortie..." required>
      </div>
      <div>
         <input type="number" id="duree_act" name="duree_act" min="0" max="500" placeholder="Durée..." required>
      </div>
      <div>
         <textarea id="synopsis_act" name="synopsis_act" placeholder="Sinopsys..." required></textarea>
      </div>
      <div>
         <input type="number" id="indice_act" name="indice_act" min="0" max="10" placeholder="Indice de culpabilité.." required>
      </div>
      <div>
         <input type="file" id="img_act" name="img_act" placeholder="Image de l'acteur..." required>
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
