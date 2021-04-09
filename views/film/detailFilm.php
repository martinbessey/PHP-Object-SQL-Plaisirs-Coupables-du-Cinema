<?php

ob_start();

?>

<h2>EXEMPLE</h2>






<?php


$titre = "EXEMPLE";
$contenu = ob_get_clean();
require "views/template.php";
