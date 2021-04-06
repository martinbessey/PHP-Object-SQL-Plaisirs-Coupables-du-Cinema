<?php

ob_start();

$editActeur = $acteur->fetch();

?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>

<section class="flex">
   <h2> Modifier les infos d'un acteur</h2>
   <form class="flex" action="./index.php?action=editActeur&id=<?=$editActeur['idacteur']?>" method="post">
      <div id="editnom" class="edit">
         <input type="text" id="nom_act" name="nom_act" value=<?=$editActeur['nom']?>>
      </div>
      <div id="editprenom" class="edit"> 
         <input type="text" id="prenom_act" name="prenom_act" value=<?=$editActeur['prenom']?>>
      </div>
      <div id="editsexe" class="edit">
         <input type="text" id="sexe_act" name="sexe_act" value=<?=$editActeur['sexe']?>>
      </div>
      <div id="editbio" class="edit">
         <input type="text" id="bio_act" name="bio_act" value=<?=$editActeur['bio']?>>
      </div>
      <div>
         <input type="submit" placeholder="Modifier" value="Modifier">
      </div>
   </form>
</section>
<?php
$contenu = ob_get_clean();
require "views/template.php";