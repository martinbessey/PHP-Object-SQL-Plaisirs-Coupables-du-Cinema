<?php

ob_start();


?>

<a href="./index.php">Retour</a>


<h2>Film supprimé avec succès</h2>


<?php

$contenu =ob_get_clean();
require "views/template.php";