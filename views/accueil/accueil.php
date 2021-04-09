<?php

ob_start();

?>

<h2>Le php cest simple</h2>






<?php


$titre = "Page d'accueil de notre site";
$contenu = ob_get_clean();
require "views/template.php";


