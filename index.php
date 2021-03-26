<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";


// $ctrlFilm = new FilmController();
$ctrlAccueil = new AccueilController;
$ctrlFilm = new FilmController;
$ctrlReal = new RealController;


$id = isset($_GET["id"]) ? $_GET['id'] : "";

if(isset($_GET['action'])){

   

switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll(); break;
        case "detailRealisateur" : $ctrlReal->findOneById($id); break;
        case  "detailFilm" : $ctrlFilm->findOneById($id);break;
        
}
}else{
    $ctrlAccueil->pageAccueil();
}

