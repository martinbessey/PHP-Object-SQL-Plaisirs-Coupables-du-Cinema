<?php

ob_start();


?>

<h2> Modifier le réalisateur</h2>


<div class="content">
   <form action="./index.php?action=editReal" method="post">
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
         <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token">
         <button type="submit">Modifier</button>
      </div>


   </form>

</div>

<?php

$contenu = ob_get_clean();
require "views/template.php";