<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";
require_once "controllers/ActeurController.php";
require_once "controllers/GenreController.php";

$ctrlAccueil = new AccueilController;
$ctrlFilm = new FilmController;
$ctrlReal = new RealController;
$ctrlAct = new ActeurController;
$ctrlGenre = new GenreController;


$id = isset($_GET["id"]) ? $_GET['id'] : "";

if(isset($_GET['action'])){

   

switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll();break;
        case "listActeurs" : $ctrlAct->findAll();break;
        case "listGenres" : $ctrlGenre->findAll();break;
        case "detailRealisateur" : $ctrlReal->findOneById($id); break;
        case "detailFilm" : $ctrlFilm->findOneById($id);break;
        case "detailActeur" : $ctrlAct->findOneById($id);break;
        case "detailGenre" : $ctrlGenre->findOneById($id);break;
        case "ajouterRealForm": $ctrlReal->addRealForm();break;
        case "ajouterReal": $ctrlReal->addReal($_POST);break;   
        case "editReal": $ctrlReal->editRealForm($id);break;      
}
}else{
    $ctrlAccueil->pageAccueil();
}

