<?php

require_once "controllers/FilmController.php";
require_once "controllers/AccueilController.php";
require_once "controllers/RealController.php";


// $ctrlFilm = new FilmController();
$ctrlAccueil = new AccueilController;
// 


if(isset($_GET['action'])){

    $id = $_GET["id"];

switch($_GET['action']){
  
   

   
   
}
}else{
    $ctrlAccueil->pageAccueil();
}

