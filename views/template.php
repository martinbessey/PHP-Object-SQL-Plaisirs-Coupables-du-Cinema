<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header class="flex wrap">
        <a href="./index.php" class="logo">
            <img src="../IMG/Sans titre-1.png" alt="plaisirs coupables du cinéma">
        </a>
        <input type="search" placeholder=" Rechercher...">
        <nav class="flex">
            <a href="index.php?action=listFilms">Films</a>
            <a href="index.php?action=listActeurs">Acteurs</a>
            <a href="index.php?action=listGenres">Genres</a>
        </nav>
    </header>
    <hr>
    <div class="content">
        <?= $contenu?>
    </div>
    <!--<footer>
        <small>Made by Martin Bessey © All rights reserved 2021</small>
    </footer>-->
</body>

</html>