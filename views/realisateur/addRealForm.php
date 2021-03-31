<?php

ob_start();


?>

<h2> Ajouter un réalisateur</h2>


<div class="content">
   <form action="./index.php?action=ajouterReal" method="post">
      <div>
         <label form="nom realisateur">Nom du realisateur:</label>
         <input type="text" id="nom_real" name="nom_real" placeholder="Durand" required>
      </div>
      <div>
         <label form="prenom realisateur">Nom du realisateur:</label>
         <input type="text" id="prenom_real" name="prenom_real" placeholder="Paul" required>
      </div>
      <div>
         <label form="sexe realisateur">Sexe du realisateur:</label>
         <input type="text" id="sexe_real" name="sexe_real" placeholder="M" required>
      </div>
      <div>
         <button type="submit">Ajouter</button>
      </div>


   </form>

</div>

<?php
$titre = "Ajouter un realisateur";
$contenu = ob_get_clean();
require "views/template.php";