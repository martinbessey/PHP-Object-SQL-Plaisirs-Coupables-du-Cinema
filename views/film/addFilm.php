<?php
ob_start();

?>
<head>
   <link rel="stylesheet" href="/css//form_style.css">
   <title>"Plaisirs coupables du cinéma"</title>
</head>
<section class="flex">
<h2><?=$_POST[('titre_film')]?> a été rajouté avec succès !</h2>
<a href="index.php">Retour</a>
</section>

<?php

$contenu= ob_get_clean();
require "./views/template.php";