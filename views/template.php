<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header class="flex wrap">
        <a href="/views/accueil/accueil.php" class="logo">
            <img src="../IMG/Sans titre-1.png" alt="plaisirs coupables du cinéma">
        </a>
        <input type="search" placeholder=" Rechercher...">
        <nav class="flex">
            <a href="index.php?action=listFilms">Films</a>
            <a href="">Acteurs</a>
            <a href="">Genres</a>
        </nav>
    </header>
        <hr>
        <div class="content">
            <?= $contenu ?>
        </div>
</body>

</html>