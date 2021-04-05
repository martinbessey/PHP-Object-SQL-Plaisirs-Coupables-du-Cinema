<?php
ob_start();

?>


<h2><?=$_POST[('prenom_real')]."".$_POST[('nom_real')]?>à été rajouté avec succès !</h2>

<?php

$contenu= ob_get_clean();
require "./views/template.php";


