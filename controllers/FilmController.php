<?php 

require_once "bdd/DAO.php";

class FilmController{


    public function findAll(){

        $dao = new DAO;

        $sql = "SELECT idfilm,titre,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, f.annee , f.indice, f.idreal,r.nom
                FROM film f
                INNER JOIN realisateur r
                ON r.idreal = f.idreal
                ORDER BY f.indice DESC";

                $films = $dao->executerRequete($sql);


        require "views/film/listFilms.php";
    }

    public function findOneById($id){
        $id = $id;
        $dao = new DAO;

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = :id";
        $film = $dao->executerRequete($sql, [":id"=> $id]);

       
    

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
 
        require "views/film/detailFilm.php";
    }
    public function addFilmForm(){
        require "views/film/addFilmForm.php";
    }
    
    public function addFilm($array){

        $dao = new DAO();

        $sql = "INSERT INTO film (titre, annee, realisateur, duree, synopsis, indice)
                VALUES (:titre, :annee, :realisateur, :duree, :synopsis, :indice)";

                $titre_film = filter_var($array['titre_film'],FILTER_SANITIZE_STRING);
                $annee_film = filter_var($array['annee_film'],FILTER_SANITIZE_NUMBER_INT);
                $realisateur_film = filter_var($array['realisateur_film'],FILTER_SANITIZE_STRING);
                $duree_film = filter_var($array['duree_film'],FILTER_SANITIZE_NUMBER_INT);
                $synopsis_film = filter_var($array['synopsis_film'],FILTER_SANITIZE_STRING);
                $indice_film = filter_var($array['indice_film'],FILTER_SANITIZE_NUMBER_FLOAT);

                $ajout = $dao->executerRequete($sql, [":titre" =>$titre_film, ":annee"=> $annee_film, ":realisateur"=> $realisateur_film, ":duree"=>$duree_film, ":synopsis"=>$synopsis_film, ":indice"=>$indice_film]);

                require "views/film/addFilm.php";
    }   

    public function findOnHomepage1($id){
        $id=$id;
        $dao = new DAO();

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = 10";
        $film = $dao->executerRequete($sql, [10 => $id]);

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
        
        require "views/film/detailFilm.php";
    }
    public function findOnHomepage2($id){
        $id=$id;
        $dao = new DAO();

        $sql = "SELECT idfilm, img, titre, annee,DATE_FORMAT(SEC_TO_TIME(duree*60), '%H:%i') AS duree, synopsis, indice, background
                FROM film f   
                WHERE f.idfilm = 1";
        $film = $dao->executerRequete($sql, [1 => $id]);

        $sql2 ="SELECT CONCAT(a.prenom,' ',a.nom)AS identite, r.personnage, a.idacteur, r.idrole, f.titre
        FROM film f INNER JOIN caster c 
        ON c.idfilm = f.idfilm
        INNER JOIN rôle r 
        ON r.idrole = c.idrole
        INNER JOIN acteur a 
        ON c.idacteur = a.idacteur
        WHERE f.idfilm = :id";

        $castings = $dao->executerRequete($sql2, [":id"=> $id]);
        
        require "views/film/detailFilm.php";
    }



}