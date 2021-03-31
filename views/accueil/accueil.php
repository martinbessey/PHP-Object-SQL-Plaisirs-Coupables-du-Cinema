<?php

ob_start();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS//style.css" type="text/CSS">
    <title>"Plaisirs coupables du cinéma"</title>
</head>

<body>
    <main class="flex wrap">
        <section class="carousel">
            <div id="banner" class="carousel-slide flex ">
                <img class="slide-image" src="./IMG//8_The-Expendables-3.jpg">
                <span>-action-</span>
                <p> La trilogie Expendables </p>
                <a href="#" class="btn">VOIR PLUS</a>
            </div>
        </section>
</body>
</html>
<?php


$titre = "Page d'accueil de notre site";
$contenu = ob_get_clean();
require "./views/template.php";


