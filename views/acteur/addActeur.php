<?php

ob_start();

?>


<h2><?=$_POST[('prenom_act')]."".$_POST[('nom_act')]?>à été rajouté avec succès !</h2>

<?php

$titre ="Acteur ajouté";
$contenu= ob_get_clean();
require "./views/template.php";
