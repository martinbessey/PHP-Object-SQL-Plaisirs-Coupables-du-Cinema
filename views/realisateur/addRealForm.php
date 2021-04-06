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
         <input type="text" id="nom_real" name="nom_real" placeholder="Nom du réalisateur..." required>
      </div>
      <div> 
         <input type="text" id="prenom_real" name="prenom_real" placeholder="Prénom du réalisateur..." required>
      </div>
      <div>
         <input type="text" id="sexe_real" name="sexe_real" placeholder="Sexe du réalisateur..." required>
      </div>
      <div>
         <input type="submit" placeholder="Ajouter" value="Ajouter">
      </div>
   </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";
