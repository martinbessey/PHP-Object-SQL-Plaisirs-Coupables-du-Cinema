<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";


$ctrlAccueil = new AccueilController;
$ctrlFilm = new FilmController;
$ctrlReal = new RealController;


$id = isset($_GET["id"]) ? $_GET['id'] : "";

if(isset($_GET['action'])){

   

switch($_GET['action']){
        case "listFilms" : $ctrlFilm->findAll();break;
        case "detailRealisateur" : $ctrlReal->findOneById($id); break;
        case "detailFilm" : $ctrlFilm->findOneById($id);break;
        case "filmographieReal": $ctrlReal->findAllById($id);break; 
        case "ajouterRealForm": $ctrlReal->addRealForm();break;
        case "ajouterReal": $ctrlReal->addReal($_POST);break;   
        case "casting": $ctrlFilm->findCasting($id);break;
        case "editReal": $ctrlReal->editRealForm($id);break;
        
}
}else{
    $ctrlAccueil->pageAccueil();
}

