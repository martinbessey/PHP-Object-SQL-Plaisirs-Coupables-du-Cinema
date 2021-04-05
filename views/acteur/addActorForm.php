<?php

ob_start();


?>

<h2> Ajouter un acteur</h2>


<div class="content">
   <form action="./index.php?action=ajouterActeur" method="post">
      <div>
         <label form="nom acteur">Nom de l'Acteur:</label>
         <input type="text" id="nom_act" name="nom_act" placeholder="Durand" required>
      </div>
      <div>
         <label form="prenom acteur">Nom de l'Acteur:</label>
         <input type="text" id="prenom_act" name="prenom_act" placeholder="Paul" required>
      </div>
      <div>
         <label form="sexe acteur">Sexe de l'Acteur:</label>
         <input type="text" id="sexe_act" name="sexe_act" placeholder="M" required>
      </div>
      <div>
         <button type="submit">Ajouter</button>
      </div>


   </form>

</div>

<?php
$titre = "Ajouter un acteur";
$contenu = ob_get_clean();
require "views/template.php";