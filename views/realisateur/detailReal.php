<?php

ob_start();

$detailReal = $realisateur->fetch();



?>
<!DOCTYPE html>
<html lang="fr">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="/css//detail_style.css">
   <title>Document</title>
</head>
<div class="flex">
    <h2>Gros plan sur <?= $detailReal['identite'] ?></h2>
</div>
<main class="flex wrap">
    <article>
        <figure>
        <?= $detailReal['img'] ?>
        </figure>
        
    </article>








    <?php

    $realisateur->closeCursor();
    $titre = "detail real";
    $contenu = ob_get_clean();
    require "views/template.php";
