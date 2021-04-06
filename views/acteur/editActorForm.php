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
      <div>
         <input type="text" id="nom_act" name="nom_act" value=<?=$editActeur['nom']?>>
      </div>
      <div> 
         <input type="text" id="prenom_act" name="prenom_act" value=<?=$editActeur['prenom']?>>
      </div>
      <div>
         <input type="text" id="sexe_act" name="sexe_act" value=<?=$editActeur['sexe']?>>
      </div>
      <div>
         <input type="submit" placeholder="Modifier" value="Modifier">
      </div>
   </form>
</section>
<?=var_dump($editActeur['nom'])?>
<?php
$contenu = ob_get_clean();
require "views/template.php";