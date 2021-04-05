<?php

ob_start();


?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2> Modifier les infos d'un acteur</h2>
   <form class="flex" action="./index.php?action=editActeur" method="post">
      <div>
         <input type="text" id="nom_act" name="nom_act" placeholder="Nom de l'acteur..." required>
      </div>
      <div> 
         <input type="text" id="prenom_act" name="prenom_act" placeholder="Prénom de l'acteur..." required>
      </div>
      <div>
         <input type="text" id="sexe_act" name="sexe_act" placeholder="Sexe de l'acteur..." required>
      </div>
      <div>
         <input type="hidden" value="<?= $_SESSION["token"] ?>" name="token">
         <input type="submit" placeholder="Modifier" value="Modifier">
      </div>
   </form>
</section>

<?php
$contenu = ob_get_clean();
require "views/template.php";