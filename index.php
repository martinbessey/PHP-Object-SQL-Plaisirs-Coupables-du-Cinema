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
    
        case "filmAcceuil1" : $ctrlFilm->findOnHomepage1($id);break;
        case "filmAcceuil2" : $ctrlFilm->findOnHomepage2($id);break;
        case "listFilms" : $ctrlFilm->findAll();break;
        case "listActeurs" : $ctrlAct->findAll();break;
        case "listReal" : $ctrlReal->findAll();break;
        case "listGenres" : $ctrlGenre->findAll();break;
        case "detailRealisateur" : $ctrlReal->findOneById($id); break;
        case "detailFilm" : $ctrlFilm->findOneById($id);break;
        case "detailActeur" : $ctrlAct->findOneById($id);break;
        case "detailGenre" : $ctrlGenre->findOneById($id);break;
        case "ajouterFilm" : $ctrlFilm->addFilm($_POST);break;
        case "ajouterFilmForm" : $ctrlFilm->addFilmForm();break;
        case "ajouterRealForm": $ctrlReal->addRealForm();break;
        case "ajouterReal": $ctrlReal->addReal($_POST);break; 
        case "ajouterActeurForm" : $ctrlAct->addActorForm();break;
        case "ajouterActeur": $ctrlAct->addActor($_POST);break; 
        case "editRealForm": $ctrlReal->editRealForm($id);break;
        case "editReal" : $ctrlReal->editReal($id, $_POST);break;  
        case "editActeurForm": $ctrlAct->editActorForm($id);break;
        case "editActeur" : $ctrlAct->editActor($id, $_POST);break;

}

}else{
    $ctrlAccueil->pageAccueil();
}

