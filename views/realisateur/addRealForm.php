<?php

ob_start();


?>


   <main class="fullwidth flex ycenter xcenter">
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
               <input type="submit" value="Ajouter">
            </div>
         </form>
      </div>
   </main>

<?php

$contenu = ob_get_clean();
require "views/template.php";
