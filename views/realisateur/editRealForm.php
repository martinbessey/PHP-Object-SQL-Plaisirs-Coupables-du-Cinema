<?php

ob_start();


$editReal = $realisateur->fetch();

?>

<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>


<section class="flex">
   <h2> Modifier le réalisateur</h2>
   <form class="flex" action="./index.php?action=editReal&id=<?$editReal['idreal']?>" method="post">
      <div>
         <input type="text" id="nom_real" name="nom_real" value=<?=$editReal['nom']?>>
      </div>
      <div>
         <input type="text" id="prenom_real" name="prenom_real" value=<?=$editReal['prenom']?>>
      </div>
      <div>
         <input type="text" id="sexe_real" name="sexe_real" value=<?=$editReal['sexe']?>>
      </div>
      <div>
      <input type="submit" placeholder="Modifier" value="Modifier">
      </div>
   </form>
</section>

<?php

$contenu = ob_get_clean();
require "views/template.php";